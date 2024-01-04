<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Exception;
use Illuminate\Http\Request;
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
    public function update(Request $request, UserInfo $userInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserInfo $userInfo)
    {
        //
    }
}
