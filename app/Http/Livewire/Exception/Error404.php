<?php

namespace App\Http\Livewire\Exception;

use Livewire\Component;

class Error404 extends Component
{
    public function render()
    {
        return view('livewire.exception.error404');
    }
}
