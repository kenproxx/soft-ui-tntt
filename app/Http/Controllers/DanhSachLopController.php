<?php

namespace App\Http\Controllers;

use App\Enums\CapHieu;
use App\Enums\ToastrEnum;
use App\Models\DanhSachLop;
use App\Models\DanhSachLopDetail;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhSachLopController extends Controller
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $params = $request->only('ma_lop', 'ten_lop', 'nganh');
        $params['location_id'] = Auth::user()->location_id;
        // check unique ma_lop

        if ($params['ma_lop']) {
            $checkMaLop = DanhSachLop::where('ma_lop', $params['ma_lop'])->first();
            if ($checkMaLop) {
                toastr()->addNotification(ToastrEnum::ERROR, 'Mã lớp đã tồn tại', ToastrEnum::LOI);
                return back();
            }
        } else {
            $params['ma_lop'] = $this->generateUniqueCode();
        }

        $danhSachLop = new DanhSachLop();
        $danhSachLop->fill($params);

        $danhSachLop->save();

        toastr()->addNotification(ToastrEnum::SUCCESS, 'Thêm lớp thành công', ToastrEnum::THANH_CONG);
        return back();
    }

    private function generateUniqueCode()
    {
        do {
            $code = generateRandomString();
        } while (DanhSachLop::where('ma_lop', $code)->exists());

        return $code;
    }

    /**
     * Display the specified resource.
     */
    public function show(DanhSachLop $danhSachLop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DanhSachLop $danhSachLop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DanhSachLop $danhSachLop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhSachLop $danhSachLop)
    {
        //
    }

    public function addMemberToClass(Request $request)
    {
        $idClass = $request->input('idClass');

        if (!$idClass) {
            toastr()->addNotification(ToastrEnum::ERROR, 'Không tìm thấy lớp', ToastrEnum::LOI);
            return back();
        }

        $nganh = DanhSachLop::where('id', $idClass)->first()->nganh;
        $listUser = explode(',', $request->input('list-user'));

        foreach ($listUser as $idUser) {
            $checkExist = DanhSachLopDetail::where('user_id', $idUser)->first();
            if (!$checkExist) {
                $danhSachLop = new DanhSachLopDetail();
                $danhSachLop->lop_id = $idClass;
                $danhSachLop->user_id = $idUser;
                $danhSachLop->save();
                $this->setNganhUserTheoLop($idUser, $nganh);
            } else {
                if ($checkExist->lop_id != $idClass) {
                    $checkExist->lop_id = $idClass;
                    $checkExist->save();
                    $this->setNganhUserTheoLop($idUser, $nganh);
                }
            }
        }

        toastr()->addNotification(ToastrEnum::SUCCESS, 'Thêm thành viên vào lớp thành công', ToastrEnum::THANH_CONG);
        return back();
    }

    private function setNganhUserTheoLop($idUser, $nganh)
    {
        // set Ngành cho user theo ngành của lớp nếu là thieu nhi
        $user = UserInfo::where('user_id', $idUser)->first();

        if (!$user) {
            $user = new UserInfo();
        }
        $capHuynhTruong = CapHieu::getListHuynhTruong();

        if (!in_array($user->cap_hieu, $capHuynhTruong)) {
            $user->cap_hieu = $nganh;
            $user->save();
        }
    }
}
