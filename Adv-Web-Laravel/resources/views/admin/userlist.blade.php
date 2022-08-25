@extends('layouts.afterLoginLayoutAdmin')
@section('content')

<form method="post" action="" >
    {{@csrf_field()}}
        Search user: <input type="text" name="search" placeholder="Type user's name">
        @error('search')
            {{$message}}<br>
        @enderror
        <input type="submit" value="Search">
</form>

    <table border=1 width=100%>
        <th>Username</th>
        <th>Role</th>
        <th>Operation</th>

        @foreach($users as $user)
        <tr>
            <td>{{$user->username}}</td>
            <td>{{$user->role}}</td>
            <td><a href="{{route('admin.changeRole',['id'=>$user->id])}}"><button>Change Role</button></a></td>
        </tr>
        @endforeach
    </table> 
    {{$users->links()}}
@endsection