<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable = [
        'sex', 'date_of_birth', 'my_phone', 'my_email',
        'ten_bo', 'nghe_nghiep_bo', 'sdt_bo',
        'ten_me', 'nghe_nghiep_me', 'sdt_me',
        'giao_phan_id', 'giao_hat_id', 'giao_xu_id', 'giao_ho_id', 'dia_chi',
        'ngay_rua_toi', 'nguoi_rua_toi', 'nguoi_do_dau_rua_toi',
        'ngay_them_suc', 'nguoi_them_suc', 'nguoi_do_dau_them_suc',
        'chuc_vu', 'cap_hieu', 'ngay_tuyen_hua_ht_1',
    ];

}
