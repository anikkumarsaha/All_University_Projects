<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\accountsModel;
use App\Models\moviesModel;
use App\Models\customersMoviesModel;

class adminController extends Controller
{

    function adminProfile(){
        
        return view('admin.profile');
    }

    function adminProfileUpload(Request $req){
        $this->validate($req,
            [
                "profilepic"=>"required|mimes:img,jpeg,gif,png"
            ],
        );

        $profilepic = session('username').".".$req->file('profilepic')->getClientOriginalExtension();
        $req->file('profilepic')->storeAs('profilepics',$profilepic);

        session()->put('profilepic', $profilepic);

        $checkUser = accountsModel::where('username','=',session('username'))->first();
        $checkUser->profilepic = $profilepic;
        $checkUser->save();
        return view('admin.profile');
    }

    function adminChangePassword(){
        return view('admin.changePassword');
    }

    function adminChangePasswordSubmit(Request $req){
        $this->validate($req,
            [
                "curr_pass"=>"required",
                "new_pass"=>"required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/|min:8",
                "conf_pass"=>"required|same:new_pass"
            ]);

            $checkUser = accountsModel::where('username','=',$req->username)->first();
            if($req->curr_pass == $checkUser->password){
                $checkUser->password= $req->new_pass;
                $checkUser->save();
                session()->put('password',$req->new_pass);
                return view('admin.profile');
            }
    }

    function adminCheckCustomersMovies(){
        $customersMovies = customersMoviesModel::all();
        return view('admin.dashboard')->with('CustomerMovieMIX',$customersMovies);
    }
    public function adminUserList()
    {
        $users = accountsModel::where('role','=','Customer')->paginate(10);
        return view('admin.userlist')->with('users',$users);
    }

    public function adminChangeRole($id)
    {
        $user = accountsModel::where('id','=',$id)->first();
        return view('admin.changeRole')->with('customer',$user);
    }

    public function adminChangeRoleSubmit(Request $req)
    {
        $user = accountsModel::where('id','=',$req->id)->first();
        $user->role = $req->role;
        $user->save();

        $users = accountsModel::where('role','=','Customer')->paginate(10);
        return view('admin.userlist')->with('users',$users);
    }

    function adminSearchUsersSubmit(Request $req){
        $this->validate($req,
            [
                "search"=>"required"
            ]);

            $users = accountsModel::where('role','=','Customer')->where('username','LIKE',$req->search.'%')->paginate(10);
            return view('admin.userlist')->with('users',$users);
            echo $users;
    }
}
