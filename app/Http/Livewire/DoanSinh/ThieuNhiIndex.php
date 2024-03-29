<?php

namespace App\Http\Livewire\DoanSinh;

use App\Enums\CapHieu;
use App\Http\Controllers\ExportExcelController;
use App\Models\User;
use Livewire\Component;

class ThieuNhiIndex extends Component
{
    public $keyword_search;
    public $role_search;
    public $page;
    public $perPage = 10;
    public $currentPage = 1;
    public $totalPage = 1;

    public function render()
    {

        $users = $this->searchUser()->get();

        $this->totalPage = ceil(count($users) / $this->perPage);

        // limit address offset by page
        $users = $users->slice(($this->currentPage - 1) * $this->perPage, $this->perPage);

        return view('livewire.doan-sinh.thieu-nhi-index', [
            'users' => $users
        ]);
    }

    private function searchUser()
    {
        $users = User::query();
        if ($this->keyword_search) {
            $users->where(function ($query) {
                $textSearch = '%' . $this->keyword_search . '%';
                $query->where('name', 'like', $textSearch)
                    ->orWhere('username', 'like', $textSearch)
                    ->orWhere('email', 'like', $textSearch)
                    ->orWhere('code', 'like', $textSearch);
            });
            $this->currentPage = 1;
        }

        if ($this->role_search) {
            $users->where('role_name', '=', $this->role_search);
            $this->currentPage = 1;
        }

        if (isOnlyRoleAdmin()) {
            $users->whereIn('location_id', getIdAddressAndChild());
        }

        $users->join('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->whereIn('user_infos.cap_hieu', [CapHieu::CHIEN_CON, CapHieu::AU_NHI, CapHieu::THIEU_NHI,
                CapHieu::NGHIA_SY, CapHieu::HIEP_SY]);


        $users->orderBy('created_at', 'desc');
        $users->select('users.*', 'user_infos.cap_hieu');
        return $users;
    }

    public function exportExcel()
    {
        $file_name = 'danh_sach_thieu_nhi-' . now() . ' ___ ' . now()->timestamp;

        $listUser = $this->searchUser()->with('userInfo')->get();

        return (new ExportExcelController())->exportExcel_User($listUser, $file_name);
    }
}
