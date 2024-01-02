<?php

use App\Enums\RoleName;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}
if (!function_exists('isNormalRole')) {
    function isNormalRole()
    {
        $allowedRoles = [RoleName::USER, RoleName::ADMIN, RoleName::SUPER_ADMIN];

        if (Auth::check() && in_array(Auth::user()->role_name, $allowedRoles)) {
            return true;
        }
        return false;
    }
}
if (!function_exists('isAdminRole')) {
    function isAdminRole()
    {
        $allowedRoles = [RoleName::ADMIN, RoleName::SUPER_ADMIN];

        if (Auth::check() && in_array(Auth::user()->role_name, $allowedRoles)) {
            return true;
        }
        return false;
    }
}
if (!function_exists('isSuperAdminRole')) {
    function isSuperAdminRole()
    {
        if (Auth::check() && Auth::user()->role_name === RoleName::SUPER_ADMIN) {
            return true;
        }
        return false;
    }
}

if (!function_exists('getNameUserById')) {
    function getNameUserById($id)
    {
        $user = User::find($id);
        if ($user) {
            return $user->name;
        }
        return '';
    }
}
