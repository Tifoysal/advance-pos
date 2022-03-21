<?php

namespace App\Http\Controllers\Login;

use App\Models\User;
use http\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect()->route('admin');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => 1,
                    'facebook_id' => $user->id,
                    'password' => bcrypt('123456')
                ]);

                Auth::login($createUser);
                return redirect()->route('admin');
            }

        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
    }


    public function login(Request $request)
    {
        // dd($request->all());
        $userPost=$request->except('_token');

        if(Auth::attempt($userPost)){
            return redirect()->route('admin')->with('msg','Login Successful');
        }
        else
        return redirect()->back()->with('msg','Incorrect information');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login')->with('msg','Logged out.');
    }

    public function adminPanel(){
        return view('admin.master');
    }

    public function loginForm(){
        return view('login.login');
    }


}
