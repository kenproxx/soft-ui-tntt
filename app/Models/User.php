<?php

namespace App\Models;

use App\Enums\RoleName;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function isNormalRole()
    {
        $allowedRoles = [RoleName::USER, RoleName::ADMIN, RoleName::SUPER_ADMIN];

        if (Auth::check() && in_array(Auth::user()->role_name, $allowedRoles)) {
            return true;
        }
        return false;
    }

    public static function isAdminRole()
    {
        $allowedRoles = [RoleName::ADMIN, RoleName::SUPER_ADMIN];

        if (Auth::check() && in_array(Auth::user()->role_name, $allowedRoles)) {
            return true;
        }
        return false;
    }

    public static function isSuperAdminRole()
    {
        if (Auth::check() && Auth::user()->role_name === RoleName::SUPER_ADMIN) {
            return true;
        }
        return false;
    }

}
