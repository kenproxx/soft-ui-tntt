<?php

namespace App\Http\Livewire\advance_config;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserEdit extends Component
{
    public function render()
    {
        $userInfo = User::with('userInfo')->find(Auth::id());
        return view('livewire.advance_config.user.edit', [
            'user' => $userInfo
        ]);
    }
}
