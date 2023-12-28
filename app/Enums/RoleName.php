<?php declare(strict_types=1);

namespace App\Enums;



use Spatie\Enum\Enum;

final class RoleName extends Enum
{
    const SUPER_ADMIN = 'SUPER_ADMIN';
    const ADMIN = 'ADMIN';
    const USER = 'USER';

}
