<?php declare(strict_types=1);

namespace App\Enums;

use ReflectionClass;
use Spatie\Enum\Enum;

final class PaginateValue extends Enum
{
    const PER_PAGE_1 = '10';
    const PER_PAGE_2 = '25';
    const PER_PAGE_3 = '50';
    const PER_PAGE_4 = '100';


    public static function getArray()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }

}
