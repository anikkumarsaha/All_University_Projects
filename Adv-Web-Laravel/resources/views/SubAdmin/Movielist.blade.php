@extends('layouts.afterLoginLayoutSubAdmin')
@section('content')
<table border='1' width='100%'>
    <th>Movie Name</th>
    <th>Movie Genre</th>
    <th>Description</th>
    <th>Banner</th>
    <th>Movie</th>
    <th>Operation</th>


    <form method="post" action="" >
    {{@csrf_field()}}
        Search user: <input type="text" name="search" placeholder="Type movie title">
        @error('search')
            {{$message}}<br>
        @enderror
        <input type="submit" value="Search">
    </form>
    
    @foreach($Movies as $movie)
    <tr>

        <td>{{$movie->name}}</td>
        <td>{{$movie->genre}}</td>
        <td>{{$movie->description}}</td>
        <td><img src="{{asset('banners')}}/{{$movie->banner}}" width="350" height="350" alt="{{$movie->name}}"></td>

        <td> <center><video controls src="{{asset('movies')}}/{{$movie->movie}}" width="350" height="350"></video></center></td>
        
        <td>
            <a href="{{route('Movie.details',['id'=>$movie->id])}}"><button>EDIT</button></a>
            <a href="{{route('Movie.delete',['id'=>$movie->id])}}"><button>DELETE</button></a>     
        </td>

        

    </tr>

    @endforeach


</table>
@endsection