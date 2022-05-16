<?php

namespace App\Http\Controllers\Login;

use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Carbon\Carbon;
use http\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function forgetPassword()
    {

        return view('admin.layouts.reset-password.forget');
    }

    public function forgetPasswordEmailPost(Request $request)
    {
        //validate request has email and it exist or not
        $request->validate([
           'email'=>'required|exists:users'
        ]);
        
        try {
            //generate link to send
            $token=Str::random(40);
            $user=User::where('email',$request->email)->first();
            $user->update([
                'reset_token'=>$token,
                'reset_token_expire_at'=>Carbon::now()->addMinute(2),
            ]);
            $link=route('admin.reset.password',$token);

            Mail::to($request->email)->send(new ResetPasswordEmail($link));

            return redirect()->back()->with('msg','Email sent to : '. $request->email);
        }catch (\Throwable $exception)
        {
           dd($exception->getMessage());
        }

        //send email
    }

    public function resetPassword($token)
    {
       return view('admin.layouts.reset-password.reset',compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'reset_token'=>'required',
            'password'=>'required|confirmed',
        ]);

      //check token exist or not
        $userHasToken=User::where('reset_token',$request->reset_token)->first();
        if($userHasToken){
            //check token expired or not
            if($userHasToken->reset_token_expire_at>=Carbon::now()){
               $userHasToken->update([
                  'password'=> bcrypt($request->password),
                   'reset_token'=>null
               ]);


               return redirect()->back()->with('msg','Password Reset Successful.');
            }else{
                return redirect()->back()->withErrors('Token Expired.');
            }

        }else
        {
            return redirect()->back()->withErrors('Token not found.');
        }


    }


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
