<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachLopDetail extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
