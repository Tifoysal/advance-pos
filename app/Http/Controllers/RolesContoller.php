<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\RolesContoller;

class RolesController extends Controller
{
public function index()
    {
        $role=Role::all();
        return view('admin.layouts.Role.index',compact('role'));

    }
    public function create(){
        return view('admin.layouts.Role.create');
    
        }
        public function store(Request $request)
    {
        Role::class([
            'name'=>$request->role_name,
            'status'=>$request->role_status,
         ]);
         return redirect()->back()->with('success','Add Role Successfully');

    }
    public function details_role($role_id){


        
        $roles = Role::find($role_id);
        return view('admin.layouts.role.view', compact('roles'));
     
}
public function edit_role($role_id){
    $roles=Role::find($role_id);
   $data=role::all();
  return view('admin.layouts.role.edit', compact('roles', ('data')));
}


public function update_role(Request $request, $role_id){
    $data=role::all();
    Role::where('id', $role_id)->update([

        'name'=>$request->name,
        'details'=>$request->details,

    ]);
    return redirect()->back()->with('success','Updated Role Successfully');
}


public function delete_role($role_id){
    

    role::find($role_id)->delete();
    return redirect()->back()->with('success','Role Deleted.');
}
}