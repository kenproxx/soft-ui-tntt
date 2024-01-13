<?php

namespace App\Http\Livewire\DoanSinh;

use App\Enums\CapHieu;
use App\Enums\RoleName;
use App\Models\DanhSachLop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DanhSachLopIndex extends Component
{
    public $keyword_search;
    public $nganh;
    public $page;
    public $perPage = 10;
    public $currentPage = 1;
    public $totalPage = 1;

    public function render()
    {
        $listClass = DanhSachLop::query();
        if ($this->keyword_search) {
            $listClass->where(function ($query) {
                $textSearch = '%' . $this->keyword_search . '%';
                $query->where('ten_lop', 'like', $textSearch)
                    ->orWhere('ma_lop', 'like', $textSearch);
            });
            $this->currentPage = 1;
        }

        if ($this->nganh) {
            $listClass->where('nganh', '=', $this->nganh);
            $this->currentPage = 1;
        }

        if (isOnlyRoleAdmin()) {
            $listClass->whereIn('location_id', getIdAddressAndChild());
        }

        $listClass->orderBy('created_at', 'desc');
        $listClass = $listClass->get();

        $this->totalPage = ceil(count($listClass) / $this->perPage);

        // limit address offset by page
        $listClass = $listClass->slice(($this->currentPage - 1) * $this->perPage, $this->perPage);

        $listUser = User::where('role_name', RoleName::USER)->whereIn('location_id', getIdAddressAndChild())->get();

        return view('livewire.doan-sinh.danh-sach-lop-index', [
            'listClass' => $listClass,
            'listUser' => $listUser,
        ]);
    }
}
