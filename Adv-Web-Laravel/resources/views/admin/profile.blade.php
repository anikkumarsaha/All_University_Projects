@extends('layouts.afterLoginLayoutAdmin')
@section('content')
    <table>
        <tr>
            <td>
                Username:
            </td>
            <td>
                {{Session::get('username')}}
            </td>
        </tr>

        <tr>
            <td>
                Email: 
            </td>
            <td>
                {{Session::get('email')}}
            </td>
        </tr>

        <tr>
            <td>
                Password:
            </td>
            <td>
                {{Session::get('password')}}
            </td>
        </tr>

        <tr>
            <td>
                Role:
            </td>
            <td>
                {{Session::get('role')}}
            </td>
        </tr>
    </table>

    <img src="{{asset('profilepics')}}/{{session('profilepic')}}">

    <form method="post" action="" enctype="multipart/form-data">
        
    {{@csrf_field()}}
        Banner File: 
        <input type="file" name="profilepic">
        @error('profilepic')
            {{$message}}<br>
        @enderror
        <br>
        <input type="submit" value="Upload">
        
    </form>

    <a href="{{route('admin.changePassword')}}">Change Password</a>
@endsection