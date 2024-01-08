<?php

namespace App\Http\Livewire\Auth;

use App\Enums\ToastrEnum;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        auth()->logout();
        toastr()->addNotification(ToastrEnum::SUCCESS, 'Đăng xuất thành công', ToastrEnum::THANH_CONG);
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
