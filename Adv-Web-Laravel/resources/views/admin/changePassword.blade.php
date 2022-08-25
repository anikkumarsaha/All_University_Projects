@extends('layouts.afterLoginLayoutAdmin')
@section('content')

<div>

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
                            <input type="text" name="username" value="{{Session::get('username')}}" readonly> 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Current password: 
                        </td>
                        <td>
                            <input type="password" name="curr_pass" placeholder="Enter your current password"> 
                            @error('curr_pass')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>
                            New password: 
                        </td>
                        <td>
                            <input type="password" name="new_pass" placeholder="Enter your new password">
                            @error('new_pass')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Confirm password: 
                        </td>
                        <td>
                            <input type="password" name="conf_pass" placeholder="Re-enter your new password">
                            @error('conf_pass')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Save">
                        </td>
                    </tr>

                </table>
            </fieldset>
        </form>
    </div>

</div>

@endsection