<?php declare(strict_types=1);

namespace App\Enums;



use ReflectionClass;
use Spatie\Enum\Enum;

final class RoleName extends Enum
{
    const SUPER_ADMIN = 'SUPER_ADMIN';
    const ADMIN = 'ADMIN';
    const USER = 'USER';

    public static function getArray()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }
}
