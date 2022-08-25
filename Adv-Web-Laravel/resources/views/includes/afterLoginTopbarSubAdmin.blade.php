<hr>
<table width="100%">
    <tr>
        <td align="right">
            <h1>Dekho</h1><a href="{{route('SubAdmin.profile')}}"><h1> {{Session::get('username')}}</h1></a>
        </td>
    </tr>

    <tr>
        <td align="right">
        <a href="{{route('public.logout')}}"><button>LOGOUT</button></a>
        </td>
    </tr>

    <tr>
        <td>
        <a href="{{route('SubAdmin.movieManage')}}">Home </a> |
        <a href="{{route('SubAdmin.AddMovies')}}"> Add Movies</a> |
        <a href="{{route('SubAdmin.VideoList')}}"> Manage Movies</a> |
        <a href="{{route('Movie.Bills')}}">Billing report</a>
        </td>
    </tr>
</table>
<hr>
