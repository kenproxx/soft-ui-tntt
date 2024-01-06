<?php declare(strict_types=1);

namespace App\Enums;

use ReflectionClass;
use Spatie\Enum\Enum;

final class GioiTinhEnum extends Enum
{
    const NAM = 'Nam';
    const NU = 'Nữ';

    public static function getArray()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }

}
