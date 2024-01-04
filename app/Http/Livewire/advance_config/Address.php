<?php

namespace App\Http\Livewire\advance_config;

use App\Enums\RoleName;
use App\Models\User;
use Livewire\Component;

class Address extends Component
{
    public $name_search;
    public $level_search;
    public $slug;
    public $page;
    public $perPage = 10;
    public $currentPage = 1;
    public $totalPage = 1;
    public $currentLocationId;

    public function setCurrentLocationId($locationId)
    {
        $this->currentLocationId = $locationId;
    }
    public function render()
    {

        $addresses = \App\Models\Address::query();

        if ($this->name_search) {
            $addresses->where(function ($query) {
                $textSearch = '%' . $this->name_search . '%';
                $query->where('name', 'like', $textSearch)
                    ->orWhere('slug', 'like', $textSearch);
            });
            $this->currentPage = 1;
        }

        if ($this->level_search) {
            $addresses->where('cap_bac', 'like', '%' . $this->cap_bac . '%');
            $this->currentPage = 1;
        }

        $addresses->orderBy('created_at', 'desc');
        $addresses = $addresses->get();

        if ($this->name_search) {
            $this->currentPage = 1;
        }

        $this->totalPage = ceil(count($addresses) / $this->perPage);

        // limit address offset by page
        $addresses = $addresses->slice(($this->currentPage - 1) * $this->perPage, $this->perPage);

        $userAdmin = User::where('role_name', RoleName::ADMIN)->get();

        return view('livewire.advance_config.address',
            ['addresses' => $addresses, 'currentPage' => $this->currentPage, 'userAdmin' => $userAdmin]);
    }

    public function delete($id)
    {
        $address = \App\Models\Address::find($id);
        $address->delete();
    }

}
