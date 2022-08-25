<form method="post" action="" enctype="multipart/form-data">
        
    {{@csrf_field()}}
        Movie ID: <input type="text" name="id" placeholder="Name"  readonly value="{{$movie->id}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror
        Movie Name: <input type="text" name="name" placeholder="Name" value="{{$movie->name}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror

        Description: <input type="text" name="description" placeholder="description" value="{{$movie->description}}"><br>
        @error('email')
            {{$message}} <br>
        @enderror

        Genre: 
        <br>
        
        <input type="radio" name="genre" value="Action" {{ $movie->genre == "Action" ? 'checked' : '' }}>Action<br>
        <input type="radio" name="genre" value="Thriller" {{ $movie->genre == "Thriller" ? 'checked' : '' }}>Thriller<br>
        <input type="radio" name="genre" value="Comedy" {{ $movie->genre == "Comedy" ? 'checked' : '' }}>Comedy<br>
        <input type="radio" name="genre" value="Adventure" {{ $movie->genre == "Adventure" ? 'checked' : '' }}>Adventure<br>
        <input type="radio" name="genre" value="Documentary" {{ $movie->genre == "Documentary" ? 'checked' : '' }}>Documentary<br>

        @error('genre')
            {{$message}}<br>
        @enderror

        <br>
        File: 
        <input type="file" name="movie">
        @error('movie')
            {{$message}}<br>
        @enderror
        <br>
        <input type="submit" value="EDIT">
        
    </form>