<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DanhSachLop extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable = [
        'ma_lop',
        'ten_lop',
        'nganh',
        'location_id',
    ];

    public static function checkUserHaveClass()
    {
        return DanhSachLopDetail::where('user_id', Auth::id())->first();
    }
}
