<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('isThieuNhi')) {
    function isThieuNhi($id = null)
    {
        $allowedRoles = [\App\Enums\CapHieu::CHIEN_CON, \App\Enums\CapHieu::AU_NHI, \App\Enums\CapHieu::THIEU_NHI,
            \App\Enums\CapHieu::NGHIA_SY, \App\Enums\CapHieu::HIEP_SY,];

        if ($id) {
            $userInfo = \App\Models\UserInfo::where('user_id', $id)->first();
            if (!$userInfo) {
                return false;
            }
            if (in_array($userInfo->cap_hieu, $allowedRoles)) {
                return true;
            }
        } else {
            if (Auth::check()) {
                $userInfo = \App\Models\UserInfo::where('user_id', Auth::id())->first();
                if (!$userInfo) {
                    return false;
                }

                if (in_array($userInfo->cap_hieu, $allowedRoles)) {
                    return true;
                }
                return false;
            }
        }
        return false;
    }
}

if (!function_exists('isHuynhTruong')) {
    function isHuynhTruong($id = null)
    {
        $allowedRoles = [\App\Enums\CapHieu::CHIEN_CON, \App\Enums\CapHieu::AU_NHI, \App\Enums\CapHieu::THIEU_NHI,
            \App\Enums\CapHieu::NGHIA_SY, \App\Enums\CapHieu::HIEP_SY,];

        if ($id) {
            $userInfo = \App\Models\UserInfo::where('user_id', $id)->first();
            if (in_array($userInfo->cap_hieu, $allowedRoles)) {
                return false;
            }
        } else {
            if (Auth::check()) {
                $userInfo = \App\Models\UserInfo::where('user_id', Auth::id())->first();
                if (in_array($userInfo->cap_hieu, $allowedRoles)) {
                    return false;
                }
                return true;
            }
        }
        return true;
    }
}
