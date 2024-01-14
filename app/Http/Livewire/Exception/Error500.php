<?php

namespace App\Http\Livewire\Exception;

use Livewire\Component;

class Error500 extends Component
{
    public function render()
    {
        return view('livewire.exception.error500');
    }
}
