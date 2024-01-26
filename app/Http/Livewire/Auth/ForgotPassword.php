<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class ForgotPassword extends Component
{
    protected $rules = [
        'username' => 'required|exists:users,username',
    ];

    public function mount()
    {
        if (auth()->user()) {
            redirect()->route('dashboard');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('layouts.base');
    }
}
