<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Role::with('permissions')->get();
//        dd($role);
        return view('admin.layouts.role.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=Role::all();
        return view('admin.layouts.role.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//      dd($request->all());
        Role::create([
            'name'=>$request->name
         ]);
         return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role_id)
    {
        $role=role::find($role_id);
     return view('admin.layouts.role.view',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $role=Role::find($id);
        return view('admin.layouts.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role=Role::find($id);
        Role::update([
            'name'=>$request->role_name,
            'status'=>$request->role_status,
         ]);
         return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignForm($role_id)
    {
    $modules=Module::with('permissions')->get();
//    dd($modules);
    return view('admin.layouts.role.assign_permissions',compact('modules','role_id'));
    }

    public function assignStore(Request $request)
    {
//dd($request->all());

        foreach ($request->permissions as $permission)
        {
            RolePermission::create([
               'role_id'=>$request->role_id,
               'permission_id'=>$permission,
            ]);
        }
         return redirect()->route('role.index');
    }
}

