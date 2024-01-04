<?php declare(strict_types=1);

namespace App\Enums;

use ReflectionClass;
use Spatie\Enum\Enum;

final class ToastrEnum extends Enum
{
    const SUCCESS = 'success';
    const ERROR = 'error';
    const INFO = 'info';
    const WARNING = 'warning';
    const LOI = 'Lỗi';
    const THANH_CONG = 'Thành công';
    const CANH_BAO = 'Cảnh báo';
    const THONG_TIN = 'Thông tin';

}
