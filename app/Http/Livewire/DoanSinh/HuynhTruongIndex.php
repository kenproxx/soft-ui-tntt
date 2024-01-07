<?php

namespace App\Http\Livewire\DoanSinh;

use App\Models\User;
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
        $users = User::all();
        return view('livewire.doan-sinh.huynh-truong-index',
        [
            'users' => $users
        ]);
    }
}
