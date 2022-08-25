<style>
body {background-color: #000;}
h4{
    color: #999;
    margin:0px;
}
p{
    color: #999;
}

 </style>
<video controls src="{{asset('movies')}}/{{$movie->movie}}" width="100%" height="50%"></video>
<h4>Name:{{$movie->name}}</h4>
<img src="{{asset('banners')}}/{{$movie->banner}}" width="20%" height="25%" alt="{{$movie->name}}">
<p>Description:{{$movie->description}}</p>
