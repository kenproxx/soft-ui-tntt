<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{


    private $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->user;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tên thánh',
            'Tên gọi',
            'Ngày sinh',
            'Giới tính',
            'Số điện thoại',
            'Email',
            'Cấp hiệu',
            'Chức vụ',
            'Giáo phận',
            'Giáo hạt',
            'Giáo xứ',
            'Giáo họ',
            'Địa chỉ',
            'Tên bố',
            'Số điện thoại bố',
            'Nghề nghiệp bố',
            "Tên mẹ",
            "Số điện thoại mẹ",
            "Nghề nghiệp mẹ",
            "Ngày rửa tội",
            "Người rửa tội",
            "Nguời đỡ đầu rửa tội",
            "Ngày thêm sức",
            "Người thêm sức",
            "Nguời đỡ đầu thêm sức",
            "Ngày tuyên hứa HT Cấp 1",
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->holy_name,
            $row->name,
            $row->userInfo->date_of_birth,
            $row->userInfo->sex,
            $row->userInfo->my_phone,
            $row->userInfo->my_email,
            $row->userInfo->cap_hieu,
            $row->userInfo->chuc_vu,
            $row->userInfo->giao_phan_id,
            $row->userInfo->giao_hat_id,
            $row->userInfo->giao_xu_id,
            $row->userInfo->giao_ho_id,
            $row->userInfo->dia_chi,
            $row->userInfo->ten_bo,
            $row->userInfo->sdt_bo,
            $row->userInfo->nghe_nghiep_bo,
            $row->userInfo->ten_me,
            $row->userInfo->sdt_me,
            $row->userInfo->nghe_nghiep_me,
            $row->userInfo->ngay_rua_toi,
            $row->userInfo->nguoi_rua_toi,
            $row->userInfo->nguoi_do_dau_rua_toi,
            $row->userInfo->ngay_them_suc,
            $row->userInfo->nguoi_them_suc,
            $row->userInfo->nguoi_do_dau_them_suc,
            $row->userInfo->ngay_tuyen_hua_ht_1,
        ];
    }
}
