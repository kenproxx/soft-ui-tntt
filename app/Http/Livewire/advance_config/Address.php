<?php

namespace App\Http\Livewire\advance_config;

use Illuminate\Support\Str;
use Livewire\Component;

class Address extends Component
{
    public $name_search;
    public $level_search;

    public $slug;
    public $page;
    public $perPage;
    public $currentPage = 1;
    public function render()
    {
        $addresses = \App\Models\Address::where([['name', 'like', '%' . $this->name_search . '%'], ['cap_bac', 'like', '%' . $this->level_search . '%'], ])->get();
        return view('livewire.advance_config.address', ['addresses' => $addresses, 'currentPage' => $this->currentPage]);
    }
}
