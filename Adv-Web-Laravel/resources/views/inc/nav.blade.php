<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h3>DEKHO</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Movies
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('DropdownSearch',['id'=>'Action'])}}">Action</a></li>
                            <li><a class="dropdown-item" href="{{route('DropdownSearch',['id'=>'Thriller'])}}">Thriller</a></li>
                            <li><a class="dropdown-item" href="{{route('DropdownSearch',['id'=>'Comedy'])}}">Comedy</a></li>
                        </ul>
                    </li>

                    @if(session()->has('username'))
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModa">
                        My List
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">My Favorite List</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <table class="table">
                                        <tr>
                                            <th width="100px">Name</th>
                                            <th width="100px">.</th>

                                        </tr>

                                        @foreach($favorites as $favorite)
                                        <tr>
                                            <td><a href=""><button>{{$favorite->movie->name}}</button></a></td>
                                            <td><a href="{{route('RemoveMylistData',['id'=>$favorite->m_id])}}"><button>Remove</button></a></td>

                                        </tr>
                                        @endforeach


                                    </table>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </li>
                    @endif

                </ul>


                <form class="d-flex" role="search" method="get" action="{{route('search')}}">

                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    @error('search')
                    {{$message}} <br>
                    @enderror
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                @if(session()->has('username'))
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">{{session()->get('username')}}</a>
                    </li>
                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            BELL
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <table class="table">
                                            <tr>
                                                <th width="100px">Name</th>
                                                <th width="100px">Time</th>
                                            </tr>

                                            @foreach($Movies as $movie)
                                            <tr>
                                                <td><a href="{{route('Movie.details',['id'=>$movie->id])}}"><button>{{$movie->name}}</button></a></td>
                                                <td>{{$movie->created_at->diffForHumans()}}</td>


                                            </tr>
                                            @endforeach
                                        </table>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('public.logout')}}">Logout</a>
                    </li>
                </ul>


                @else

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('public.login')}}">Login</a>
                    </li>
                </ul>


                @endif


                </li>
                </ul>

            </div>
        </div>
    </nav>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>