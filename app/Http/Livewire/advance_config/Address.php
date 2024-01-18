<?php

namespace App\Http\Livewire\advance_config;

use App\Enums\RoleName;
use App\Models\User;
use Livewire\Component;

class Address extends Component
{
    public $name_search;
    public $cap_bac_search;
    public $slug;
    public $page;
    public $perPage = 10;
    public $currentPage = 1;
    public $totalPage = 1;
    public $currentLocationId;

    public function render()
    {
        $addresses = \App\Models\Address::query();

        if ($this->name_search) {
            $textSearch = '%' . $this->name_search . '%';
            $addresses->where(function ($query) use ($textSearch) {
                $query->where('name', 'like', $textSearch)
                    ->orWhere('slug', 'like', $textSearch);
            });
            $this->currentPage = 1;
        }

        if ($this->cap_bac_search) {
            $addresses->where('cap_bac', 'like', '%' . $this->cap_bac_search . '%');
            $this->currentPage = 1;
        }

        $addresses->orderBy('created_at', 'desc');

        $totalAddresses = $addresses->count();

        $this->totalPage = ceil($totalAddresses / $this->perPage);

        $addresses = $addresses->skip(($this->currentPage - 1) * $this->perPage)
            ->take($this->perPage)
            ->get();

        $userAdmin = User::where('role_name', RoleName::ADMIN)->get();

        $listAddress = \App\Models\Address::all()->toHierarchy()->toArray();

        return view('livewire.advance_config.address',
            ['addresses' => $addresses, 'currentPage' => $this->currentPage, 'userAdmin' => $userAdmin, 'listAddress' => $listAddress]);
    }

}
