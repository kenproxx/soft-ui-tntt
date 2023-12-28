<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SignUp extends Component
{
    public $code = '';
    public $name = '';
    public $username = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'username' => 'required|unique:users',
        'password' => 'required|min:6'
    ];

    public function mount()
    {
        if (auth()->user()) {
            redirect('/dashboard');
        }
    }

    public function register()
    {
        $this->validate();
        $user = User::create([
            'code' => generateRandomString(),
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password)
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
