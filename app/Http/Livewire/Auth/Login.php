<?php

namespace App\Http\Livewire\Auth;

use App\Enums\ToastrEnum;
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
            redirect()->route('dashboard');
        }
    }

    public function login()
    {
        $credentials = $this->validate();
        if (auth()->attempt(['username' => $this->username, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["username" => $this->username])->first();
            auth()->login($user, $this->remember_me);
            toastr()->addNotification(ToastrEnum::SUCCESS, 'Đăng nhập thành công', ToastrEnum::THANH_CONG);
            redirect()->route('dashboard');
        } else {
            toastr()->addNotification(ToastrEnum::ERROR, trans('auth.failed'), ToastrEnum::LOI);
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
