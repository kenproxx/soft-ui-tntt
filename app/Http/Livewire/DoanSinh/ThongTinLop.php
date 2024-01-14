<?php

namespace App\Http\Livewire\DoanSinh;

use App\Models\DanhSachLop;
use App\Models\DanhSachLopDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ThongTinLop extends Component
{
    public $idClass;
    public $keyword_search;
    public $role_search;
    public $location_search;
    public $page;
    public $perPage = 10;
    public $currentPage = 1;
    public $totalPage = 1;

    public function mount($idClass = null)
    {
        $this->idClass = $idClass;
    }

    public function render()
    {
        if (!$this->idClass) {
            $lop_id = DanhSachLopDetail::where('user_id', Auth::id())->first('lop_id');
            $this->idClass = $lop_id->lop_id;
        } else {
            $lop_id = $this->idClass;
        }

        $classMember = DanhSachLopDetail::where('lop_id', $lop_id->lop_id)->with('user')->orderBy('created_at', 'desc')->get();

        $classInfo = DanhSachLop::find($lop_id->lop_id);

        $this->totalPage = ceil(count($classMember) / $this->perPage);

        // limit address offset by page
        $classMember = $classMember->slice(($this->currentPage - 1) * $this->perPage, $this->perPage);

        return view('livewire.doan-sinh.thong-tin-lop', [
            'classMember' => $classMember,
            'classInfo' => $classInfo,
        ]);
    }

}
