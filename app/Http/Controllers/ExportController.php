<?php

namespace App\Http\Controllers;

use App\Events\UserEvent;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new UsersExport(),date('Y-m-d').'.xlsx');
    }

    public function fileImport(Request $request)
    {
//        dd($request->all());
        Excel::import(new UsersImport, $request->file('excel')->store('temp'));

        if(Cache::has('USERS')){
            Cache::forget('USERS');
        }

        return redirect()->back();


//        $file=$request->file('execl');
//
//        foreach ($file as $row)
//        {
//            User::create(
//                [
//                    'role_id'=>$row['0'],
//                    'role_id'=>$row['0'],
//                    'role_id'=>$row['0'],
//                    'role_id'=>$row['0']
//                ]
//            );
//        }

    }
}
