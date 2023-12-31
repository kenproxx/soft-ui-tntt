<?php declare(strict_types=1);

namespace App\Enums;

use ReflectionClass;
use Spatie\Enum\Enum;

final class CapHieu extends Enum
{
    const CHIEN_CON = 'Chiên con';
    const AU_NHI = 'Ấu nhi';
    const THIEU_NHI = 'Thiếu nhi';
    const NGHIA_SY = 'Nghĩa sỹ';
    const HIEP_SY = 'Hiệp sỹ';
    const DU_TRUONG = 'Dự trưởng';
    const HUYNH_TRUONG_C1 = 'Huynh trưởng cấp 1';
    const HUYNH_TRUONG_C2 = 'Huynh trưởng cấp 2';
    const HUYNH_TRUONG_C3 = 'Huynh trưởng cấp 3';
    const HLV_1 = 'Huấn luyện viên cấp 1';
    const HLV_2 = 'Huấn luyện viên cấp 2';
    const HLV_3 = 'Huấn luyện viên cấp 3';
    const TRO_TA = 'Trợ tá';
    const TRO_UY = 'Trợ úy';
    const TUYEN_UY = 'Tuyên úy';

    public static function getArray()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }

    public static function getListThieuNhi()
    {
        $allowedConstants = ['CHIEN_CON', 'AU_NHI', 'THIEU_NHI', 'NGHIA_SY', 'HIEP_SY'];

        $reflectionClass = new ReflectionClass(static::class);
        $constants = $reflectionClass->getConstants();

        $filteredConstants = array_intersect_key($constants, array_flip($allowedConstants));

        return $filteredConstants;
    }

    public static function getListHuynhTruong()
    {
        $allowedConstants = ['DU_TRUONG', 'HUYNH_TRUONG_C1', 'HUYNH_TRUONG_C2', 'HUYNH_TRUONG_C3', 'HLV_1', 'HLV_2', 'HLV_3', 'TRO_TA', 'TRO_UY', 'TUYEN_UY'];

        $reflectionClass = new ReflectionClass(static::class);
        $constants = $reflectionClass->getConstants();

        $filteredConstants = array_intersect_key($constants, array_flip($allowedConstants));

        return $filteredConstants;
    }
}
