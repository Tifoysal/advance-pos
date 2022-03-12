<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());
        $userPost=$request->except('_token');

        if(Auth::attempt($userPost)){
            return redirect()->route('admin.panel')->with('msg','Login Successful');
        }
        else
        return redirect()->back()->with('msg','Incorrect information');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.form')->with('msg','Logged out.');
    }

    public function adminPanel(){
        return view('admin.master');
    }

    public function loginForm(){
        return view('login.login');
    }


}
