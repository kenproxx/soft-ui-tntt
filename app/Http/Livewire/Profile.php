<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        $user = User::whereId(\Auth::id())->with('userInfo')->first();
        return view('livewire.profile', compact('user'));
    }
}
