@extends('layouts.beforeLoginLayout')
@section('content')

<div align="center">

    {{Session::get('loginFailedMessage')}}
    {{Session::get('loginCheckMessage')}}
    @if (session()->has('OTP'))
    <p1 style="color: red;"> Enter your otp again </p1>
    @endif

    <div>
        <form method="post" action="">
            {{@csrf_field()}}
            <fieldset>
                <table>
                    <tr>
                        <td>
                            Username: 
                        </td>
                        <td>
                            <input type="text" name="username" placeholder="Username" value="{{old('username')}}"> 
                            @error('username')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Password: 
                        </td>
                        <td>
                            <input type="password" name="password" placeholder="Password">
                            @error('password')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="LOGIN">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <a href="{{route('public.registration')}}">Register</a> 
                        </td>
                        <td align="right">
                            <a href="{{route('public.forgotPassword')}}">Forgot Password?</a> 
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>

</div>

@endsection