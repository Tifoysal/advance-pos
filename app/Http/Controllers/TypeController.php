<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function list()
    {
        return view('type.list');
    }

    public function getTypeData()
    {
        $types=Type::all();
        return response()->json([
          'data'=>$types,
          'message'=>'types loaded',
          'success'=>true
        ]);
    }

    public function setTypeData(Request $request)
    {

       $type=Type::create([
           'name'=>$request->name
       ]);
        return response()->json([
          'data'=>$type,
          'message'=>'types created',
          'success'=>true
        ]);
    }
}
