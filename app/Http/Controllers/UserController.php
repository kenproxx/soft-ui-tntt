<?php

namespace App\Http\Controllers;

use App\Enums\ToastrEnum;
use App\Models\User;
use App\Models\UserInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserInfo $userInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        } catch (Exception $e) {
            toastr()->addNotification('error', $e->getMessage(), 'Lỗi');
            return back();
        }

        $param_user = $request->only(['name', 'holy_name', 'role_name']);
        $param_user_info = $request
            ->only(['sex', 'date_of_birth', 'my_phone', 'my_email',
                'ten_bo', 'nghe_nghiep_bo', 'sdt_bo',
                'ten_me', 'nghe_nghiep_me', 'sdt_me',
                'giao_phan_id', 'giao_hat_id', 'giao_xu_id', 'giao_ho_id', 'dia_chi',
                'ngay_rua_toi', 'nguoi_rua_toi', 'nguoi_do_dau_rua_toi',
                'ngay_them_suc', 'nguoi_them_suc', 'nguoi_do_dau_them_suc',
                'chuc_vu', 'cap_hieu', 'ngay_tuyen_hua_ht_1'
            ]);

        $user = User::find($id);

        $file = $request->hasFile('avatar');
        if ($file) {
            $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('avatar');
            $result1 = $file->store('images', 'public');

            $urlFile = asset('storage/' . $result1);

            $urlImage = (new CloudinaryController())->uploadByURL($urlFile);

            /* nếu upload ảnh thành công, thì gán vào param, đồng thời xóa ảnh cũ trên cloud */
            if ($urlImage) {
                $param_user['avatar'] = $urlImage;

                $currentPublic_id = explode('/', $user->avatar);
                $currentPublic_id = end($currentPublic_id);

                (new CloudinaryController())->deleteByPublicId($currentPublic_id);
            }

            File::delete(public_path('storage/' . $result1));
        }

        $user->fill($param_user);
        $result1 = $user->save();

        $userInfo = UserInfo::where('user_id', $id)->first();

        if (!$userInfo) {
            $userInfo = new UserInfo();
            $userInfo->user_id = $id;
        }

        $userInfo->fill($param_user_info);
        $result2 = $userInfo->save();

        if ($result1 && $result2) {
            toastr()->addNotification('success', 'Sửa thành công', 'Thành công');
        } else {
            toastr()->addNotification('error', 'Sửa thất bại', 'Lỗi');
        }
        return redirect()->route('user.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|min:4|max:20|unique:users',
                'name' => 'required|string|max:255',
                'role_name' => 'required',
                'password' => 'required|min:6|max:12',
            ]);
        } catch (Exception $e) {
            toastr()->addNotification('error', $e->getMessage(), 'Lỗi');
            return back();
        }

        $params = $request->only(['name', 'username', 'role_name']);
        $params['password'] = Hash::make($request->input('password'));
        $params['code'] = $this->generateUniqueCode();

        if (isOnlyRoleAdmin()) {
            $params['location_id'] = Auth::user()->location_id;
        }

        $user = new User();
        $user->fill($params);

        $user->save();

        return back();
    }

    private function generateUniqueCode()
    {
        do {
            $code = generateRandomString();
        } while (User::where('code', $code)->exists());

        return $code;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $result = $user->delete();

        if ($result) {
            toastr()->addNotification(ToastrEnum::SUCCESS, 'Xóa thành công', ToastrEnum::THANH_CONG);
        } else {
            toastr()->addNotification(ToastrEnum::ERROR, 'Xóa thất bại', ToastrEnum::LOI);
        }
        return redirect()->route('user.index');
    }

    public function recoverPassword(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|exists:users,username',
            ]);
        } catch (Exception $e) {
            toastr()->addNotification(ToastrEnum::ERROR, $e->getMessage(), ToastrEnum::LOI);
            return back();
        }

        $user = User::where('username', $request->input('username'))->first();
        if ($user) {
            $user->notify(new \App\Notifications\ResetPassword($user->id));
            toastr()->addNotification(ToastrEnum::SUCCESS, 'Đã gửi liên kết đổi mật khẩu về email của bạn, vui lòng kiểm tra', ToastrEnum::THANH_CONG);
            return redirect()->route('login');
        }
        toastr()->addNotification(ToastrEnum::ERROR, 'username không tồn tại.', ToastrEnum::LOI);
        return back();
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('avatar');
        $result1 = $file->store('images', 'public');

//        (new ZipArchiveController())->compressFile($result1);
        $urlFile = asset('storage/' . $result1);

        $urlImage = (new CloudinaryController())->uploadByURL($urlFile);

        File::delete(public_path('storage/' . $result1));

        if (!$urlImage) {
            toastr()->addNotification(ToastrEnum::ERROR, 'Upload ảnh thất bại', ToastrEnum::LOI);
            return back();
        }

        /* nếu upload ảnh thành công, thì gán vào param, */

        $currentPublic_id = explode('/', Auth::user()->avatar);
        $currentPublic_id = end($currentPublic_id);

        (new CloudinaryController())->deleteByPublicId($currentPublic_id);

        $user = User::find(Auth::user()->id);
        $user->avatar = $urlImage;
        $user->save();

        toastr()->addNotification(ToastrEnum::SUCCESS, 'Cập nhật ảnh đại diện thành công', ToastrEnum::THANH_CONG);
        return back();
    }
}
