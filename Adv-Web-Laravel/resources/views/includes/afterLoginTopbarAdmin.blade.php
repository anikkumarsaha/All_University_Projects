
<hr>
<table width="100%">
    <tr>
        <td align="right">
            <h1>Welcome</h1><a href="{{route('admin.profile')}}"><h1> {{Session::get('username')}}</h1></a>
        </td>
    </tr>

    <tr>
        <td align="right">
        <a href="{{route('public.logout')}}"><button>LOGOUT</button></a>
        </td>
    </tr>

    <tr>
        <td>
        <a href="{{route('admin.userlist')}}">User List</a>
        </td>
    </tr>
</table>
<hr>