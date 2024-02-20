<?php


use App\Enums\CapBacAddress;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

if (!function_exists('disableUserHasAdmin')) {
    function disableUserHasAdmin($location_id)
    {
        if (!$location_id) {
            return '';
        }
        return 'disabled';
    }
}
if (!function_exists('selectedUser')) {
    function selectedUser($location_id, $location_user_id)
    {
        if ($location_user_id != $location_id) {
            return '';
        }
        return 'selected';
    }
}
if (!function_exists('accountOfBelowGiaoXu')) {
    function accountOfBelowGiaoXu()
    {
        $allowedRoles = [CapBacAddress::GIAO_HO, CapBacAddress::GIAO_DIEM];
        $address = Address::find(Auth::user()->location_id);

        if (!$address) {
            return false;
        }

        if (Auth::check() && in_array($address->cap_bac, $allowedRoles)) {
            return true;
        }
        return false;
    }
}
if (!function_exists('accountOfGiaoXu')) {
    function accountOfGiaoXu()
    {
        $allowedRoles = [CapBacAddress::GIAO_XU];
        $address = Address::find(Auth::user()->location_id);

        if (!$address) {
            return false;
        }

        if (Auth::check() && in_array($address->cap_bac, $allowedRoles)) {
            return true;
        }
        return false;
    }
}
if (!function_exists('adminOfHigherGiaoXu')) {
    function accountOfHigherGiaoXu()
    {
        $allowedRoles = [CapBacAddress::GIAO_HAT, CapBacAddress::GIAO_TINH, CapBacAddress::GIAO_PHAN];
        $address = Address::find(Auth::user()->location_id);

        if (!$address) {
            return false;
        }

        if (Auth::check() && in_array($address->cap_bac, $allowedRoles)) {
            return true;
        }
        return false;
    }
}
if (!function_exists('getIdAddressAndChild')) {
    function getIdAddressAndChild($id = null)
    {
        {
            if ($id) {
                $address = Address::find($id);
            } else {
                if (isOnlyRoleSuperAdmin()) {
                    $address = Address::all()->pluck('id')->toArray();

                    return $address;
                }
                $locationId = Auth::user()->location_id;
                if (!$locationId) {
                    return [];
                }
                $address = Address::find($locationId);
            }


            $addressChild = $address->getDescendantsAndSelf()->pluck('id')->toArray();
            return $addressChild;
        }
    }
}
if (!function_exists('getElementAddressAndChild')) {
    function getElementAddressAndChild($id = null)
    {
        if ($id) {
            $address = Address::find($id);
        } else {
            if (isOnlyRoleSuperAdmin()) {
                $address = Address::all()->toHierarchy();
                return $address;
            }
            $locationId = Auth::user()->location_id;
            if (!$locationId) {
                return [];
            }
            $address = Address::find($locationId);
        }

        $addressChild = $address->getDescendants();
        return $addressChild;
    }
}
if (!function_exists('getNameAddressById')) {
    function getNameAddressById($id = null)
    {
        if (!$id) {
            return '';
        }
        $address = Address::find($id);

        if (!$address) {
            return $id;
        }

        return $address->name ?? $id;
    }
}
