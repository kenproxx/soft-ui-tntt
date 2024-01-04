<?php


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
