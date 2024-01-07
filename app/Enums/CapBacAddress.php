<?php declare(strict_types=1);

namespace App\Enums;

use ReflectionClass;
use Spatie\Enum\Enum;

final class CapBacAddress extends Enum
{
    const GIAO_TINH = 'Giáo tỉnh';
    const GIAO_PHAN = 'Giáo phận';
    const GIAO_HAT = 'Giáo hạt';
    const GIAO_XU = 'Giáo xứ';
    const GIAO_HO = 'Giáo họ';
    const GIAO_DIEM = 'Giáo điểm';

    public static function getArray()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }

}
