@extends('layout.layout1')
@section('content')
<h1>S</h1>





</table>
<div class="row">
    @foreach($Movies as $movie)

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">

                <div class="embed-responsive embed-responsive-16by9">
                    <!-- <video class="embed-responsive-item" controls src="{{asset('movies')}}/{{$movie->movie}}" allowfullscreen></video> -->
                    <img src="{{asset('banners')}}/{{$movie->banner}}" width="350" height="350" alt="{{$movie->name}}">
                </div>
                <a href="#" class="btn-primary">Watch Now</a>
                <p>Rating: {{$movie->rating}}</p>

            </div>
        </div>
    </div>
    @endforeach
</div>



@endsection