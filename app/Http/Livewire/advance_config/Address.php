<?php

namespace App\Http\Livewire\advance_config;

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

    public function render()
    {
        $addresses = \App\Models\Address::where([
            ['name', 'like', '%'.$this->name_search.'%'],
            ['cap_bac', 'like', '%'.$this->level_search.'%'],
            ['slug', 'like', '%'.$this->name_search.'%'],
        ])->orderBy('created_at', 'desc')->get();

        if ($this->name_search) {
            $this->currentPage = 1;
        }

        $this->totalPage = ceil(count($addresses) / $this->perPage);

        // limit address offset by page
        $addresses = $addresses->slice(($this->currentPage - 1) * $this->perPage, $this->perPage);

        return view('livewire.advance_config.address',
            ['addresses' => $addresses, 'currentPage' => $this->currentPage]);
    }

    public function delete($id)
    {
        $address = \App\Models\Address::find($id);
        $address->delete();
    }
}
