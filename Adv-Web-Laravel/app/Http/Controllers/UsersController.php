<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Movies;
use App\Models\Mylist;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function login()
    {
           return redirect()->route('public.login');
            
    }
    function logout(){
        session()->flush();
        return redirect()->route('home');
    }

    function home(){
        $persionId=session()->get('id');
        $favorite= Mylist::where('c_id','=',$persionId)->get();
        $data=Movies::all();
        
        return view('home')->with('Movies',$data)->with('favorites',$favorite);
        
    }
    public function search(Request $request){
        
        $this->validate($request,[
            'search'=>'required'

        ]);
        $search_textl=$request->search;

        $data=Movies::orderBy('id','desc')
       ->where('name','like','%'.$search_textl .'%')->get();
       
       $persionId=session()->get('id');
       $favorite= Mylist::where('c_id','=',$persionId)->get();
   

       return view('search')->with('Movies',$data)->with('favorites',$favorite);
        
        
    }
    public function DropdownSearch($id){
        
       
        $search_textl=$id;
        $data=Movies::orderBy('id','desc')
       ->where('genre','like','%'.$search_textl .'%')->get();

        $persionId=session()->get('id');
        $favorite= Mylist::where('c_id','=',$persionId)->get();
        return view('search')->with('Movies',$data)->with('favorites',$favorite);
        
        
    }

    public function WatchMovie($id){
        //Not functional, gonna work on it later
        $movie=Movies::where('id','=',$id)->first();
        return view('Subadmin.MovieWatch')->With('movie',$movie);
    }

    public function addlist($id){
        
        
        $moviecheck=Mylist::where('m_id','=',$id)->where('c_id','=',session()->get('id'))->first();

        if($moviecheck==null)
        {
            $persionId=session()->get('id');
            $data = new Mylist();
            $data->c_id = $persionId;
            $data->m_id =$id;
            $data->save();
        }
        else{
            

        }
        return redirect()->route('home');
    }


    public function RemoveMylistData($id){
        Mylist::where('m_id','=',$id)->Delete();
        return redirect()->route('home');
    }
}
