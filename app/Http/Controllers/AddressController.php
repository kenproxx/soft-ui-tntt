<?php

namespace App\Http\Controllers;

use App\Enums\CapBacAddress;
use App\Enums\ToastrEnum;
use App\Models\Address;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.address.index');
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
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        } catch (Exception $e) {
            toastr()->addNotification(ToastrEnum::ERROR, $e->getMessage(), ToastrEnum::LOI);
            return back();
        }

        $params = $request->only(['name', 'cap_bac']);
        $params['slug'] = strtoupper(Str::slug($request->input('name')));

        $address = new Address();
        $address->fill($params);

        $address->save();

        if ($request->input('parent_id')) {
            $address->makeChildOf(Address::find($request->input('parent_id')));
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $address = Address::find($id);

        if (!$address) {
            toastr()->addNotification(ToastrEnum::ERROR, "Không tìm thấy địa chỉ", ToastrEnum::LOI);
            return back();
        }

        $address->load('children');

        return response()->json($address);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $address = Address::where('id', $id)->first();

        if (!$address) {
            toastr()->addNotification(ToastrEnum::ERROR, "Không tìm thấy địa chỉ", ToastrEnum::LOI);
            return back();
        }

        $listIDAddress = getIdAddressAndChild($id);
        if ($address->deleted_at) {
            \App\Models\Address::whereIn('id', $listIDAddress)->update(['deleted_at' => null]);
            toastr()->addNotification(ToastrEnum::SUCCESS, "Khôi phục thành công", ToastrEnum::THANH_CONG);
        } else{
            \App\Models\Address::whereIn('id', $listIDAddress)->update(['deleted_at' => now()]);
            toastr()->addNotification(ToastrEnum::SUCCESS, "Xóa thành công", ToastrEnum::THANH_CONG);
        }

        return back();
    }

    public function handSetUserAddress(Request $request)
    {
        $user = User::find($request->input('id'));

        if (!$request->input('id')) {
            $user = User::where('location_id', $request->input('location_id'))->first();
            $user->location_id = '';
            $user->save();
            toastr()->addNotification(ToastrEnum::SUCCESS, "Sửa thành công", ToastrEnum::THANH_CONG);
            return back();
        }

        if (!$user) {
            toastr()->addNotification(ToastrEnum::ERROR, "Không tìm thấy user", ToastrEnum::LOI);
            return back();
        }
        $user->location_id = $request->input('location_id');
        $user->save();
        toastr()->addNotification(ToastrEnum::SUCCESS, "Sửa thành công", ToastrEnum::THANH_CONG);
        return back();

    }

    public function getGiaoPhan()
    {
        $listGiaoPhan = Address::where([['depth', 1], ['cap_bac', CapBacAddress::GIAO_PHAN]])->orderBy('name', 'asc')->get();
        return response()->json($listGiaoPhan);
    }
    public function getGiaoHatByGiaoPhan($id)
    {
        $listGiaoHat = Address::where([['cap_bac', CapBacAddress::GIAO_HAT], ['parent_id', $id]])->orderBy('name', 'asc')->get();
        return response()->json($listGiaoHat);
    }

    public function getGiaoXuByGiaoHat($id)
    {
        $listGiaoXu = Address::where([['cap_bac', CapBacAddress::GIAO_XU], ['parent_id', $id]])->orderBy('name', 'asc')->get();
        return response()->json($listGiaoXu);
    }

    public function getGiaoHoByGiaoXu($id)
    {
        $listGiaoHo = Address::where([['cap_bac', CapBacAddress::GIAO_HO], ['parent_id', $id]])->orderBy('name', 'asc')->get();
        return response()->json($listGiaoHo);
    }
}
