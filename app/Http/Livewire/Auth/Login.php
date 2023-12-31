<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    public $username = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function mount()
    {
        if (auth()->user()) {
            redirect('/dashboard');
        }
        $this->fill(['username' => 'admin@softui.com', 'password' => 'secret']);
    }

    public function login()
    {
        $credentials = $this->validate();
        if (auth()->attempt(['username' => $this->username, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["username" => $this->username])->first();
            auth()->login($user, $this->remember_me);
            return redirect()->intended('/dashboard');
        } else {
            return $this->addError('username', trans('auth.failed'));
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
