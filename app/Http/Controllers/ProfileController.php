<?php

namespace App\Http\Controllers;

use App\Enums\ToastrEnum;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $CAP_NHAT_THANH_CONG = 'Cập nhật thông tin thành công';

    public function saveThongTinCaNhan(Request $request)
    {
        $params = $request->only('holy_name', 'name');

        $this->saveUser($params);

        $params = $request->only('date_of_birth', 'sex',
            'my_email', 'my_phone');

        return $this->saveUserInfo($params);
    }

    public function saveThongTinPhuHuynh(Request $request)
    {
        $params = $request->only('ten_bo', 'sdt_bo',
            'nghe_nghiep_bo', 'ten_me', 'sdt_me', 'nghe_nghiep_me');

        return $this->saveUserInfo($params);
    }

    public function saveThongTinKhac(Request $request)
    {
        $params = $request->only('dia_chi', 'ngay_rua_toi',
            'nguoi_rua_toi', 'nguoi_do_dau_rua_toi', 'ngay_them_suc',
            'nguoi_them_suc', 'nguoi_do_dau_them_suc', 'ngay_tuyen_hua_ht_1');

        return $this->saveUserInfo($params);
    }

    private function saveUserInfo($params)
    {
        $user = UserInfo::whereUserId(\Auth::id())->first();
        if ($user) {
            $user->update($params);
        }
        toastr()->addNotification(ToastrEnum::SUCCESS, $this->CAP_NHAT_THANH_CONG, ToastrEnum::THANH_CONG);
        return back();
    }

    private function saveUser($params)
    {
        $user = User::whereId(\Auth::id())->first();
        if ($user) {
            $user->update($params);
        }
    }


}
