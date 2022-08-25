<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Movies;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    public function movieList()
    {        
        $data=Movies::all();
        return response()->json($data);

    }
    public function search(Request $request){
        
        $data=Movies::orderBy('id','desc')
       ->where('name','like','%'.$request->search .'%')->get();
   
        return response()->json($data,200);
      
    }
    
    // public function banneruplode(Request $req)
    // {
    //     $validator = Validator::make($req->all(),
    //     [
    //         "name"=>"required|min:5",
    //         "banner"=>"required|mimes:img,jpeg,gif,png"

    //     ],
    
    //     [
    //         "name.mimes"=>"Must write something ",
            
            
    //     ]);

    //     if ($validator->fails())
    //     {
    //         return response()->json($validator->errors(),422);
    //     }
        
    //         $banner = $req->name.".jpg";
    //         $req->file('slidebanner')->storeAs('slidebanner',$banner);

    //         $banners = new Banner();
    //         $banners->name = $req->name;
    //         $banners->banner = $banner;
    //         $banners->save();
            
    //         return response()->json(["msg"=>"Banner uploaded"],200);
            
    // }

    public function WatchMovie($id){
        //Not functional, gonna work on it later
        $movie=Movies::where('id','=',$id)->first();
        
        return response()->json($movie,200);
    }

    function UserProfile (Request $req)
    {
        $user=Accounts::where('username',$req->username)->first();
        return response()->json($user,200);
    }

    function ProfilePicUp(Request $req)
    {

        $validator = Validator::make($req->all(),
        [
            "profilepic"=>"mimes:img,jpeg,gif,png"

        ]);

        if ($validator->fails())
            {
                return response()->json($validator->errors(),404);
            }


            $profilepic = $req->username.Str::random(5).".jpg";
            $req->file('profilepic')->storeAs('profilepics',$profilepic);
            
            $checkUser = Accounts::where('username','=',$req->username)->first();
            $checkUser->profilepic = $profilepic;
            $checkUser->save();    
    
        return response()->json(['msg'=>'Profile Uploaded'],200);

    }

}
