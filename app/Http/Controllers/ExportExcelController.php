<?php

namespace App\Http\Controllers;

use App\Enums\ToastrEnum;
use App\Exports\UserExport;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Exception;

class ExportExcelController extends Controller
{
    /**
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export()
    {
        $user = User::where('id', '!=', null)->with('userInfo')->get();
        $excel = app('excel');
        $excel = $excel->download(new UserExport($user), 'users.xlsx');
        return $excel;
    }

    public function exportExcel_User($collection_list_data, $file_name)
    {
        $excel = app('excel');

        $listUser = $collection_list_data;

        if (count($listUser) == 0) {
            toastr()->addNotification(ToastrEnum::ERROR, 'Không có dữ liệu để export', ToastrEnum::LOI);
            return back();
        }

        // kiem tra xem filename co chua phan mo rong .xlsx chua

        if (!str_contains($file_name, '.xlsx')) {
            $file_name .= '.xlsx';
        }

        return $excel->download(new UserExport($listUser), $file_name);
    }
}
