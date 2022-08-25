@extends('layouts.afterLoginLayoutSubAdmin')
@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        
    {{@csrf_field()}}
        Movie Name: <input type="text" name="name" placeholder="Name" value="{{old('name')}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror

        Description: <input type="text" name="description" placeholder="description" value="{{old('description')}}"><br>
        @error('email')
            {{$message}} <br>
        @enderror

        Genre: 
        <br>
        <input type="radio" name="genre" value='Action'>Action<br>
        <input type="radio" name="genre" value='Thriller'>Thriller<br>
        <input type="radio" name="genre" value='Comedy'>Comedy<br>
        <input type="radio" name="genre" value='Adventure'>Adventure<br>
        <input type="radio" name="genre" value='Documentary'>Documentary<br>
        
        @error('genre')
            {{$message}}<br>
        @enderror

        <br>
        Movie File: 
        <input type="file" name="movie">
        @error('movie')
            {{$message}}<br>
        @enderror
        <br>
        <br>
        Banner File: 
        <input type="file" name="banner">
        @error('banner')
            {{$message}}<br>
        @enderror
        <br>
        <input type="submit" value="Upload">
        
    </form>
    @endsection