@extends('layouts.afterLoginLayoutSubAdmin')
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
    <a href="{{route('admin.changePassword')}}">Change Password</a>
@endsection