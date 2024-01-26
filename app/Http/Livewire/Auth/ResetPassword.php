<?php

namespace App\Http\Livewire\Auth;

use App\Enums\ToastrEnum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{
    public $username = '';
    public $password = '';
    public $passwordConfirmation = '';

    public $urlID = '';

    protected $rules = [
        'username' => 'required|exists:users,username',
        'password' => 'required|min:6|same:passwordConfirmation'
    ];

    public function mount($id)
    {
        $existingUser = User::find($id);
        $this->urlID = intval($existingUser->id);
    }

    public function resetPassword()
    {
        $this->validate();
        $existingUser = User::where('username', $this->username)->first();
        if ($existingUser && $existingUser->id == $this->urlID) {
            $existingUser->update([
                'password' => Hash::make($this->password)
            ]);

            toastr()->addNotification(ToastrEnum::SUCCESS, 'Đổi mật khẩu thành công', ToastrEnum::THANH_CONG);
            return redirect()->route('login');
        } else {
            toastr()->addNotification(ToastrEnum::ERROR, 'Đây không phải là username cần đổi mật khẩu', ToastrEnum::LOI);
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password')->layout('layouts.base');
    }
}
