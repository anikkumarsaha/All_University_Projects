@extends('layouts.beforeLoginLayout')
@section('content')

<div align="center">

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
                            Email: 
                        </td>
                        <td>
                            <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                            @error('email')
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
                        <td>
                            Confirm Password: 
                        </td>
                        <td>
                            <input type="password" name="confirmPassword" placeholder="Re-enter password">
                            @error('confirmPassword')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="REGISTER">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>

</div>

@endsection