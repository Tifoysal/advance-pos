<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\LaravelPackageTools\Package;

class AjaxController extends Controller
{
    public function list()
    {
        return view('admin.ajax.list');
    }

    public function get()
    {
        $data=Category::all();
        return response()->json([
            'success'=>true,
            'data'=>$data,
            'message'=>'Category loaded successful.'
        ]);
    }

    public function create(Request $request)
    {
        $category=Category::create([
            'name'=>$request->name,
            'details'=>$request->name
        ]);

        return response()->json([
            'success'=>true,
            'data'=>$category,
            'message'=>'Category created successful.'
        ]);

    }
}
