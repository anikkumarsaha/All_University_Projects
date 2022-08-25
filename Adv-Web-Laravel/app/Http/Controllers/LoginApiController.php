<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Mail\OTPCode;
use App\Models\Tokens;
use App\Models\accountsModel;
use App\Models\moviesModel;
use App\Models\customersMoviesModel;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgetPassword;


class LoginApiController extends Controller
{
    function login (Request $req)
    {
        $validator = Validator::make($req->all(),
            [
                "username"=>"required|exists:accounts,Username",
                "password"=>"required"
            ]);

            if ($validator->fails())
            {
                return response()->json($validator->errors(),404);
            }

            $checkUser = accountsModel::where('username','=',$req->username)->where('password','=',$req->password)->first();

            if($checkUser){

                //User paile
                $token=Tokens::where('u_id',$checkUser->id)
                                ->where('role',$checkUser->role)
                                    ->whereNull('expired_at')->first();

                if ($token) {
                    return response()->json(["msg"=>"Login Successful","user"=>$checkUser,"token"=>$token],200);
                }
                //id,username,email,pass,role,pp session e rakhsilam
                            //session lagle alada table use korbo

                //role check kore alada page e pathaidisilam
                $key=Str::random(67);  
                $token = new Tokens();
                $token->token=$key;
                $token->u_id=$checkUser->id;
                $token->role=$checkUser->role;
                $token->created_at=new DateTime();
                $token->save();

                return response()->json(["msg"=>"Login Successful","user"=>$checkUser,"token"=>$token],200);

            }
            else{
                // User na paile
                //session clear kore ager page e pathay disilam

                return response()->json(["msg"=>"Could not find any user"],404);
            }
    }

    function registration (Request $req)
    {
        $validator = Validator::make($req->all(),
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

            if ($validator->fails())
            {
                return response()->json($validator->errors(),404);
            }

            $register = new accountsModel();
            $register->username = $req->username;
            $register->email = $req->email;
            $register->password = $req->password; 
            // $register->PaymentDate = "NULL";           
            $register->save();

            return response()->json(["msg"=>"Login Successful"],200);


    }

    function forgetpass (Request $req)
    {

        $validator = Validator::make($req->all(),
            [
                "email"=>"required|exists:accounts,Email",
            ],
        
            [
                "email.required"=>"Type an email",
                "email.exists"=>"No such email found in databse",
            ]);


            if ($validator->fails())
            {
                return response()->json($validator->errors(),404);
            }

            for ($i=0; $i < 6 ; $i++) { 
                $otp[$i] = rand(0,9);
            }
            $otp=implode("",$otp);

            session()->put('OTP', $otp);
            
            $start = Carbon::now();
            session()->put('startTime',$start);
            session()->put('F_email',$req->email);          
    
            
            Mail::to($req->email)->send(new ForgetPassword($otp)); 
            return response()->json(["msg"=>"MAIL Successful","email"=>$req->email,'otp'=>session()->get('OTP')],200);

    }
/*
    function OTP (Request $req)
    {
        $otp = session()->get('OTP');
        return response()->json(["otp",$otp],200);
    }
*/
    function UserInfo (Request $req)
    {
        $user=accountsModel::where('username',$req->username)->first();
        return response()->json($user,200);
    }

    function Logout (Request $req)
    {
        $data = accountsModel::where('username',$req->username)->first();
        $id =$data->id;
        $user=Tokens::where('u_id',$id)->first();
        if($user!=null)
        {
            $user->delete();
            return response()->json(["msg"=>"Logout Successful"],200);
        }

    }

    function passChange (Request $req)
    {
        $validator = Validator::make($req->all(),
            [
                "curr_pass"=>"required",
                "new_pass"=>"required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/|min:8",
                "conf_pass"=>"required|same:new_pass"
            ]);

            if ($validator->fails())
            {
                return response()->json($validator->errors(),404);
            }

            $checkUser = accountsModel::where('email','=',$req->email)->first();
            if($req->curr_pass == $checkUser->password){
                $checkUser->password= $req->new_pass;
                $checkUser->save();
                return response()->json(["msg"=>"Password Changed"],200);
            }
            else
            {
                return response()->json(["msg"=>"Old Password is wrong"],200);
            }

    }

    

}
