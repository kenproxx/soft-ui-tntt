<?php

namespace App\Http\Controllers;

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
        $excel = $excel->download( new UserExport($user), 'users.xlsx');
        return $excel;
    }
}
