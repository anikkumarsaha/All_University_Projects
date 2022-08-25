<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Movies;



class SubAdminController extends Controller
{

    public function ManageMovies()
    {        
        $data=Movies::all();
        return view('SubAdmin.movieManage')->with('Movies',$data);
    }

    public function SubAdminProfile()
    {
        return view('SubAdmin.profile');
    }

    public function AddMovies()
    {
        return view('SubAdmin.AddMovies');
    }


    public function UploadMovie(Request $req)
    {

        $this->validate($req,
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


            $movie = $req->name.".".$req->file('movie')->getClientOriginalExtension();
            $req->file('movie')->storeAs('movies',$movie);

            $banner = $req->name.".".$req->file('banner')->getClientOriginalExtension();
            $req->file('banner')->storeAs('banners',$banner);

            $movies = new Movies;
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            $movies->movie = $movie;
            $movies->banner = $banner;
            $movies->save();

        return redirect()->route('SubAdmin.VideoList');
    }

    public function Movielist()
    {
        $data=Movies::all();
        return view('SubAdmin.Movielist')->with('Movies',$data);

    }

    public function details($id)
    {
        $movie = Movies::where('id','=',$id)->first();

        return view('Movies.details')->with('movie',$movie);
    }

    public function UpdateMovie(Request $req)
    {

        $this->validate($req,
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

            if($req->movie==NULL)
            {
            $movies = Movies::where('id','=',$req->id)->first();
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            $movies->save();
            }
            else{
            $movie = $req->name.".".$req->file('movie')->getClientOriginalExtension();
            $req->file('movie')->storeAs('movies',$movie);
            $movies = Movies::where('id','=',$req->id)->first();
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            $movies->movie = $movie;
            $movies->save();
            }
            

        return redirect()->route('SubAdmin.VideoList');
    }

    public function DeleteMovie($id){

        Movies::where('id','=',$id)->delete();
        return redirect()->route('SubAdmin.VideoList');
    }

    public function WatchMovie($id){
        //Not functional, gonna work on it later
        $movie=Movies::where('id','=',$id)->first();
        return view('Subadmin.MovieWatch')->With('movie',$movie);
    }
    
    public function BillingDetails(){

        $actives = Accounts::where('status','=','Active')->count();
        $bans = Accounts::where('status','=','Banned')->count();
        $inactives = Accounts::where('status','=','Inactive')->count();
        $bills['actives'] = $actives;        
        $bills['bans'] = $bans;        
        $bills['inactives'] = $inactives;        
        $bills['total'] = $inactives+$actives+$bans;
        
        $Accounts = Accounts::paginate(20);
        return view('SubAdmin.BillingDetails')->with('Bills',$bills)
                                            ->with('Accounts',$Accounts);
    }
    
    public function BillingDetailsSearch(Request $req){


        $actives = Accounts::where('status','=','Active')->count();
        $bans = Accounts::where('status','=','Banned')->count();
        $inactives = Accounts::where('status','=','Inactive')->count();
        $bills['actives'] = $actives;        
        $bills['bans'] = $bans;        
        $bills['inactives'] = $inactives;        
        $bills['total'] = $inactives+$actives+$bans;
        $Accounts = Accounts::where('username','Like',$req->search.'%')->paginate(20);

        return view('SubAdmin.BillingDetails')->with('Bills',$bills)
                                            ->with('Accounts',$Accounts);
    }

    public function StatusChange($id)
    {
        $customer = Accounts::where('id','=',$id)->first();

        return view('customer.details')->with('customer',$customer);
        
    }

    public function UpdateStatus(Request $req)
    {
        $customer = Accounts::where('id','=',$req->id)->first();
        $customer->status = $req->status;
        $customer->save();




        $actives = Accounts::where('status','=','Active')->count();
        $bans = Accounts::where('status','=','Banned')->count();
        $inactives = Accounts::where('status','=','Inactive')->count();
        $bills['actives'] = $actives;        
        $bills['bans'] = $bans;        
        $bills['inactives'] = $inactives;        
        $bills['total'] = $inactives+$actives+$bans;
        $Accounts = Accounts::paginate(20);
        
        return view('SubAdmin.BillingDetails')->with('Bills',$bills)
                                              ->with('Accounts',$Accounts);
    }

    public function SearchMovie(Request $req)
    {
        $data=Movies::all();
        return view('SubAdmin.Movielist')->with('Movies',$data);
    }

    public function SearchMovieSubmit(Request $req)
    {     
        $movies = Movies::where('name','Like',$req->search.'%')->paginate(3);
        return view('SubAdmin.Movielist')->with('Movies',$movies);

    }

    

}
