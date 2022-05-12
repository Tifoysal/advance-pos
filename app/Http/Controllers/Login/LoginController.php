<?php

namespace App\Http\Controllers\Login;

use App\Jobs\SendResetPasswordJob;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Mail\ResetPasswordEmail;
use App\Models\Category;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Spatie\DbDumper\Databases\MySql;

class LoginController extends Controller
{

    public function backupDb()
    {


        MySql::create()
            ->setDbName(config('database.connections.mysql.database'))
            ->setUserName(config('database.connections.mysql.username'))
            ->setPassword(config('database.connections.mysql.password'))
            ->dumpToFile('advance-pos.sql');

        return response()->download(public_path('/advance-pos.sql'));

    }
//$user=DB::table('users')->select('*')->where('user_id','1')->get();
// output: select * from users where user_id=1

    public function test()
    {
        return view('test');
    }

    public function membership()
    {
        return view('login.membership');
    }

    public function membershipGet($type)
    {
        if($type=='free')
        {
            //make free membership
            $user=User::find(auth()->user()->id);
            $user->update([
                'membership_type'=>'free'
            ]);
            return redirect()->route('admin');
        }elseif($type=='premium')
        {
            //decide price
            $price=100;

            # Here you have to receive all the order data to initate the payment.
            # Let's say, your oder transaction informations are saving in a table called "orders"
            # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

            $post_data = array();
            $post_data['total_amount'] = $price; # You cant not pay less than 10
            $post_data['currency'] = "BDT";
            $post_data['tran_id'] = uniqid(); // tran_id must be unique

            # CUSTOMER INFORMATION
            $post_data['cus_name'] = auth()->user()->name;
            $post_data['cus_email'] =  auth()->user()->email;
            $post_data['cus_add1'] = 'Customer Address';
            $post_data['cus_add2'] = "";
            $post_data['cus_city'] = "";
            $post_data['cus_state'] = "";
            $post_data['cus_postcode'] = "";
            $post_data['cus_country'] = "Bangladesh";
            $post_data['cus_phone'] = '8801XXXXXXXXX';
            $post_data['cus_fax'] = "";

            # SHIPMENT INFORMATION
            $post_data['ship_name'] = "Store Test";
            $post_data['ship_add1'] = "Dhaka";
            $post_data['ship_add2'] = "Dhaka";
            $post_data['ship_city'] = "Dhaka";
            $post_data['ship_state'] = "Dhaka";
            $post_data['ship_postcode'] = "1000";
            $post_data['ship_phone'] = "";
            $post_data['ship_country'] = "Bangladesh";

            $post_data['shipping_method'] = "NO";
            $post_data['product_name'] = "Computer";
            $post_data['product_category'] = "Goods";
            $post_data['product_profile'] = "physical-goods";

            # OPTIONAL PARAMETERS
            $post_data['value_a'] = "ref001";
            $post_data['value_b'] = "ref002";
            $post_data['value_c'] = "ref003";
            $post_data['value_d'] = "ref004";

            #Before  going to initiate the payment payment status need to insert or update as Pending.
            Payment::create([
               'tran_id'=> $post_data['tran_id'],
               'user_id'=> auth()->user()->id,
               'amount'=> $price,
               'method'=> 'ssl',
               'package_name'=>$type
            ]);

            $sslc = new SslCommerzNotification();
            # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
            $payment_options = $sslc->makePayment($post_data, 'hosted');

            if (!is_array($payment_options)) {
                print_r($payment_options);
                $payment_options = array();
            }
        }else
        {
            //decide price
            $price=150;
            dd($price);
        }

        //make payment via ssl commerz





        return view('login.membership');
    }

    public function changeLanguage($local)
    {
        App::setLocale($local);
        session()->put('applocale', $local);

        return redirect()->back();

    }

    public function package()
    {
        $user=User::all();
        return $user;
    }





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

          dispatch(new  SendResetPasswordJob($link,$user->email));

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
