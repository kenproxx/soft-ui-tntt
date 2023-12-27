<?php declare(strict_types=1);

namespace App\Enums;


use Illuminate\Validation\Rules\Enum;

final class CapBacAddress extends Enum
{
    const TOAN_QUOC = 'Toàn quốc';
    const GIAO_TINH = 'Giáo tỉnh';
    const GIAO_PHAN = 'Giáo phận';
    const GIAO_HAT = 'Giáo hạt';
    const GIAO_XU = 'Giáo xứ';
    const GIAO_HO = 'Giáo họ';
    const GIAO_DIEM = 'Giáo điểm';

}
