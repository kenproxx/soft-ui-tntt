<?php

namespace App\Http\Controllers;

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
            toastr()->addNotification('error', $e->getMessage(), 'Lỗi');
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
    public function show(Address $address)
    {
        //
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
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
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
}
