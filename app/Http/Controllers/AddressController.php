<?php

namespace App\Http\Controllers;

use App\Enums\ToastrEnum;
use App\Models\Address;
use App\Models\User;
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
        $params = $request->only(['name', 'cap_bac']);
        $params['slug'] = strtoupper(Str::studly($request->input('name')));

        $address = new Address();
        $address->fill($params);
        $address->parent_id = null;

        $address->save();

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
