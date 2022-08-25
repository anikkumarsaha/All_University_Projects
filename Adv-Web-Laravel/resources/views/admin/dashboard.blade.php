@extends('layouts.afterLoginLayoutAdmin')
@section('content')
    <table border="1">
        <th>Users</th>
        <th>Movies</th>
        @foreach($CustomerMovieMIX as $cm)
            <tr>
                <td>{{$cm->accountsModel->username}}</td>
                <td>{{$cm->moviesModel->name}}</td>
            </tr>
        @endforeach
    </table>
@endsection