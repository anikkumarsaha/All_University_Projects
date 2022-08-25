<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\Accounts;
use App\Models\Chat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{


    public function uploads(Request $req)
    {
        $validator = Validator::make($req->all(),
        [
            "name"=>"required|min:5",
            "description"=>"required|min:10|max:2000",
            "genre"=>"required|in:Action,Thriller,Comedy,Adventure,Documentary",
            "movie"=>"required|mimes:mp4,m4vm,mov,mkv",
            "banner"=>"required|mimes:img,jpeg,gif,png"

        ],
    
        [
            "description.required"=>"Must write something about the movie",
            "genre.required"=>"Must select the movie genre",
            "movie.mimes"=>"Please select the valid file type which are mp4,m4vm,mov,mkv"
            
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors(),422);
        }
        

            
            
            $movie = $req->name.".mp4";
            $req->file('movie')->storeAs('movies',$movie);

            $banner = $req->name.".jpg";
            $req->file('banner')->storeAs('banners',$banner);

            $movies = new Movies;
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            $movies->movie = $movie;
            $movies->banner = $banner;
            $movies->save();
            
            return response()->json(["msg"=>"Movie uploaded"],200);
            
    }
    

    public function movieList()
    {        
        $data=Movies::all();
        return response()->json($data);

    }

    public function MovieSearch(Request $req)
    {             

            $data=Movies::where('name','LIKE',$req->search.'%')->get();
            return response()->json($data);
        

    }

    public function movieDetails($id)
    {        
        $data = Movies::where('id',$id)->first();

        return response()->json($data);

    }

    public function UpdateMovie(Request $req)
    {

        $validator = Validator::make($req->all(),
            [
                "name"=>"required|min:5",
                "description"=>"required|min:10|max:2000",
                "genre"=>"required|in:Action,Thriller,Comedy,Adventure,Documentary",
                "movie"=>"mimes:mp4,m4vm,mov,mkv",
                "banner"=>"mimes:img,jpeg,gif,png"

            ],
        
            [
                "description.required"=>"Must write something about the movie",
                "genre.required"=>"Must select the movie genre",
                "movie.mimes"=>"Please select the valid file type which are mp4,m4vm,mov,mkv"
                
            ]);

            if ($validator->fails())
        {
            return response()->json($validator->errors(),422);
        }

            $movies = Movies::where('id','=',$req->id)->first();
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            if($req->movie!=NULL)
            {
                $movie = $req->name.".mp4";
                $req->file('movie')->storeAs('movies',$movie);
            }
            
            if($req->banner!=NULL)
            {
                $banner = $req->name.".jpg";
                $req->file('banner')->storeAs('banners',$banner);
            }
            $movies->save();
            

            return response()->json(["msg"=>"Movie updated"],200);
            
    }

    public function DeleteMovie($id)
    {
        Movies::where('id','=',$id)->delete();            
    }


    public function BillingDetails(){

        $actives = Accounts::where('status','=','Active')->count();
        $bans = Accounts::where('status','=','Banned')->count();
        $inactives = Accounts::where('status','=','Inactive')->count();
        $bills['actives'] = $actives;        
        $bills['bans'] = $bans;        
        $bills['inactives'] = $inactives;        

        
        $Accounts = Accounts::all();

        return response()->json(["bills"=>$bills,"accounts"=>$Accounts],200);
    }

    public function ChangeStatus(Request $req){

       $user = Accounts::where('id','=',$req->id)->first();
       $user->status=$req->status;
       $user->save();
       return response()->json(["msg"=>$req->status],200);
    }
 

    public function Chatting(){

        $chat = Chat::where('r_id','=',1)->orderBy('created_at', 'asc')->get();   

        return response()->json($chat,200);
    }

    public function sendText(Request $req){

        //jaitese text
        $msg = new Chat;
        $msg->s_id = $req->id;
        $msg->a_id = 0;
        $msg->r_id = 1;
        $msg->text = $req->text;

        $msg->save();
            

        return response()->json($msg,200);
    }

    public function sendTextByCustomer(Request $req){

        //jaitese text by customer
        $msg = new Chat;
        $msg->s_id = 0;
        $msg->a_id = $req->id;
        $msg->r_id = 1;
        $msg->text = $req->text;

        $msg->save();
        return response()->json($msg,200);
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

    function ChangePassword(Request $req )
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

            $checkUser = Accounts::where('username','=',$req->username)->first();
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
 