<?php

namespace App\Http\Controllers;

use App\Events\UserEvent;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//Cache::forget('USERS');
        if(Cache::has('USERS'))
        {
            $users=Cache::get('USERS');
            $msg='Data from cache';
        }else
        {
            $users=User::with('role')->get();
            Cache::put('USERS',$users);
            $msg='Data from Database';
        }

        return view('admin.layouts.users.index',compact('users','msg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.layouts.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userimage='';
        if ($request->hasfile('Imagefile')) {
            $file=$request->file('Imagefile');
            $userimage=date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/uploads/User/',$userimage);
           // dd($userimage);
        }
        User::create([
            'name'=>$request->username,
            'role_id' =>$request->role,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'image'=>$userimage,

        ]);

        event(new UserEvent());
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $userview=User::find($user_id);
        return view('admin.layouts.users.show',compact('userview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $useredit=User::find($user_id);
        $roles=Role::all();
        return view('admin.layouts.users.edit',compact('useredit','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $userupdate=User::find($user_id);
        $user_image=$userupdate->image;
                if($request->hasFile('Imagefile'))
                {
                    $user_image=date('Ymdhis') .'.'. $request->file('Imagefile')->getClientOriginalExtension();

                    $request->file('Imagefile')->storeAs('/uploads',$user_image);

                }

        $userupdate->update([
            'name'=>$request->username,
            'role_id' =>$request->role,
            'email'=>$request->email,
            'password'=>$request->password,
            'image'=>$user_image,

        ]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user=User::findOrFail($user_id);
        $user->delete();
        event(new UserEvent($user));
        return redirect()->back();
    }

    public function allData(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>
                        <a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>
                        <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
