<?php

namespace App\Http\Controllers;

use App\Enums\ToastrEnum;
use App\Models\ThongTinDoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThongTinDoanController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ThongTinDoan $thongTinDoan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ThongTinDoan $thongTinDoan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $length = count($request->name);
        $address_id = Auth::user()->location_id;

        /* xóa ảnh cũ trên cloud*/
        $oldInfo = ThongTinDoan::where('address_id', $address_id)->get();
        foreach ($oldInfo as $item) {
            $currentPublic_id = explode('/', $item->avatar);
            $currentPublic_id = end($currentPublic_id);

            (new CloudinaryController())->deleteByPublicId($currentPublic_id);
            $item->delete();
        }

        for ($i = 0; $i < $length; $i++) {
            $thongTinDoan = new ThongTinDoan();
            $thongTinDoan->ten_thanh_vien = $request->name[$i];
            $thongTinDoan->chuc_vu = $request->chuc_vu[$i];
            $thongTinDoan->sdt = $request->sdt[$i];
            $thongTinDoan->address_id = $address_id;
            $thongTinDoan->stt = $i + 1;
            $thongTinDoan->avatar = (new CloudinaryController())->uploadByFileImage($request->avatar[$i]);

            $thongTinDoan->save();
        }

        toastr()->addNotification(ToastrEnum::SUCCESS, "Cập nhật thông tin thành công", ToastrEnum::THANH_CONG);
        return redirect()->route('doan-sinh.thong-tin-doan.edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ThongTinDoan $thongTinDoan)
    {
        //
    }
}
