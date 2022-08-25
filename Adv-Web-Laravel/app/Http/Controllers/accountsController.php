<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\accountsModel;
use App\Models\moviesModel;
use App\Models\customersMoviesModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPassword;
use Carbon\Carbon;

class accountsController extends Controller
{
    function publicLogin(){
        return view('public.login');
    }

    function publicLoginSubmit(Request $req){
        $this->validate($req,
            [
                "username"=>"required|exists:accounts,Username",
                "password"=>"required"
            ]);

            $checkUser = accountsModel::where('username','=',$req->username)->where('password','=',$req->password)->first();
            if($checkUser){
                session()->put('id',$checkUser->id);
                session()->put('username',$checkUser->username);
                session()->put('email',$checkUser->email);
                session()->put('password',$checkUser->password);
                session()->put('role',$checkUser->role);
                session()->put('profilepic',$checkUser->profilepic);

                if($checkUser->role == 'Admin'){
                    return redirect()->route("admin.checkCustomersMovies");
                }
                else if($checkUser->role == 'SubAdmin'){
                    return redirect()->route("SubAdmin.movieManage");
                }
                else{
                    return redirect()->route("home");
                }
            }
            else{
                session()->flash("loginFailedMessage","Login Failed");
                return back();
            }
    }

    function publicLogout(){
        session()->flush();
        return redirect()->route("public.login");
    }

    function publicRegistration(){
        return view('public.registration');
    }

    function publicRegistrationSubmit(Request $req){
        $this->validate($req,
            [
                "username"=>"required|alpha|unique:accounts,Username",
                "email"=>"required|unique:accounts,Email",
                "password"=>"required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/|min:8",
                "confirmPassword"=>"required|same:password"
            ],
        
            [
                "password.regex"=>"Password must contain upper case, lower case, number and special characters",
                "confirmPassword.same"=>"Confirm password and password must match"
            ]);

            $register = new accountsModel();
            $register->username = $req->username;
            $register->email = $req->email;
            $register->password = $req->password;
            
            $register->save();

            return view("public.login");
    }

    function publicForgotPassword(){

        return view('public.forgotPassword');
    }

    public function publicOTP(Request $req)
    {
        $this->validate($req,
            [
                "email"=>"required|exists:accounts,Email",
            ],
        
            [
                "email.required"=>"Type an email",
                "email.exists"=>"No such email found in databse",
            ]);

            for ($i=0; $i < 6 ; $i++) { 
                $otp[$i] = rand(0,9);
            }
            $otp=implode("",$otp);

            session()->put('OTP', $otp);
            
            $start = Carbon::now();
            session()->put('startTime',$start);
            session()->put('F_email',$req->email);          

            Mail::to($req->email)->send(new ForgetPassword($otp));  

            return redirect()->route('public.viewFogretPass');

    }

    public function viewFogretPass()
    {
        return view('public.OTPsubmit');
    }

    public function publicOTPcheck(Request $req)
    {
        
        
        if (session()->get('OTP')==$req->otp) {
            session()->forget('OTP');
            return redirect()->route('public.PassChange');
        }
        else
        {
            $end = Carbon::now();
            if(session()->get('startTime')->diffInMinutes($end)>='5')
            {
                session()->flash('OTP', 'OTP not matched, send OTP again');
                session()->forget('F_email');
                return redirect()->route("public.login");
            }
            else{
                //return redirect()->route("public.viewFogretPass");
                session()->flash('msg', "Special message goes here");
                return back();
            }           
            
        }
    }

    public function ViewChangePass()
    {
        return view('public.changePassword');
    }

    public function PassChange(Request $req)
    {
        $this->validate($req,
            [
                "password"=>"required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/|min:8",
                "conf_password"=>"required|same:password"
            ],
        
            [
                "password.regex"=>"Password must contain upper case, lower case, number and special characters",
                "conf_password.same"=>"Confirm password and password must match"
            ]);
            
            $email = session()->get('F_email');
            var_dump (session()->get('F_email'));
            $acc = accountsModel::where('email','=',$email)->first();    
            $acc->password = $req->password;
            session()->forget('F_email');
            $acc->save();


            return redirect()->route('public.login');

        
    }
}
