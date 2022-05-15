<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new UsersExport(),date('Y-m-d').'.xlsx');
    }
}
