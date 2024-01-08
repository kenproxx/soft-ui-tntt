<?php

use App\Enums\CapHieu;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

if (!function_exists('isThieuNhi')) {
    function isThieuNhi($id = null)
    {
        $allowedRoles = [CapHieu::CHIEN_CON, CapHieu::AU_NHI, CapHieu::THIEU_NHI,
            CapHieu::NGHIA_SY, CapHieu::HIEP_SY];

        if ($id) {
            $userInfo = UserInfo::where('user_id', $id)->first();
            if (!$userInfo) {
                return false;
            }
            if (in_array($userInfo->cap_hieu, $allowedRoles)) {
                return true;
            }
        } else {
            if (Auth::check()) {
                $userInfo = UserInfo::where('user_id', Auth::id())->first();
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
        $allowedRoles = [CapHieu::CHIEN_CON, CapHieu::AU_NHI, CapHieu::THIEU_NHI,
            CapHieu::NGHIA_SY, CapHieu::HIEP_SY,];

        if ($id) {
            $userInfo = UserInfo::where('user_id', $id)->first();
            if (in_array($userInfo->cap_hieu, $allowedRoles)) {
                return false;
            }
        } else {
            if (Auth::check()) {
                $userInfo = UserInfo::where('user_id', Auth::id())->first();
                if (in_array($userInfo->cap_hieu, $allowedRoles)) {
                    return false;
                }
                return true;
            }
        }
        return true;
    }
}
