<?php

namespace App\Http\Controllers;

use App\Models\DanhSachLop;
use App\Models\User;
use Exception;
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
                toastr()->addNotification('error', 'Mã lớp đã tồn tại', 'Lỗi');
                return back();
            }
        } else {
            $params['ma_lop'] = $this->generateUniqueCode();
        }

        $danhSachLop = new DanhSachLop();
        $danhSachLop->fill($params);

        $danhSachLop->save();

        toastr()->addNotification('success', 'Thêm lớp thành công', 'Thành công');
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
}
