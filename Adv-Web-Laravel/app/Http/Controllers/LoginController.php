<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login()
    {

          
           $id='nn';
           session()->put('id',$id);
           return redirect()->route('home');
            
    }
    function logout(){
        session()->forget('id');
       
        return redirect()->route('home');
    }

    function home(){

        $data=Movies::all();
        
        return view('home')->with('Movies',$data);
        
    }
}
