<?php

namespace App\Http\Livewire\DoanSinh;

use App\Enums\CapHieu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HuynhTruongIndex extends Component
{
    public $keyword_search;
    public $role_search;
    public $location_search;
    public $page;
    public $perPage = 10;
    public $currentPage = 1;
    public $totalPage = 1;

    public function render()
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

        if ($this->location_search) {
            $users->where('location_id', 'like', '%' . $this->location_search . '%');
            $this->currentPage = 1;
        }

        if ($this->role_search) {
            $users->where('role_name', '=', $this->role_search);
            $this->currentPage = 1;
        }

        if (isOnlyRoleAdmin()) {
            if (!Auth::user()->location_id) {
                return view('livewire.advance_config.user.index', ['users' => []]);
            }
            $users->where('location_id', Auth::user()->location_id);
        }

        $users->join('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->whereNotIn('user_infos.cap_hieu', [CapHieu::CHIEN_CON, CapHieu::AU_NHI, CapHieu::THIEU_NHI,
                CapHieu::NGHIA_SY, CapHieu::HIEP_SY]);

        $users->orderBy('created_at', 'desc');
        $users->select('users.*', 'user_infos.cap_hieu');
        $users = $users->get();

        $this->totalPage = ceil(count($users) / $this->perPage);

        // limit address offset by page
        $users = $users->slice(($this->currentPage - 1) * $this->perPage, $this->perPage);
        return view('livewire.doan-sinh.huynh-truong-index',
            [
                'users' => $users
            ]);
    }
}
