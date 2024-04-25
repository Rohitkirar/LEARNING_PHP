<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>
        @yield('title')
    </title>

</head>

<body class="font-sans antialiased">


    <nav class="navbar navbar-expand-lg " style="background-color:grey ; max-height:3rem">

        <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
            <img src="{{ asset('Upload/snapchat.png') }}" style="width:25% ; height:25%;" alt="logo">
            <span style="color:white">ɮʟօɢ</span>
        </a>

        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link" style="color:white" href="{{ route('users.index') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="color:white" href="{{ route('posts.index') }}">All Posts</a>
                    </li>

                    {{-- 
                    <li class="nav-item">
                        <a class="nav-link" style="color:white" href="{{ route('users.edit', Auth::user()->id) }}">Edit
                            Details
                        </a>
                    </li> 
                    --}}

                    {{-- 
                    <li class="nav-item">
                        <a class="nav-link" style="color:white" href="/updatepassword">Change Password</a>
                    </li> 
                    --}}


                    <li class="nav-item">
                        <a class="nav-link" style="color:white" href="{{ route('posts.create') }}">Create Post</a>
                    </li>

                </ul>

            </div>

            <div class="d-flex " style="color:white ; margin-right:1rem ;">
                <div class="btn-group">
                    <p>
                        Welcome, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                    </p>
                    <p type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></p>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link" style="color:black" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li>
                            {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                            {!! Form::submit('logout', [ 'class' => 'nav-link text-danger' , 'style' => 'border:none; background-color:transparent']) !!}
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </div>
            </div>
        @endauth

    </nav>

    <!-- Page Content -->
    <main style="min-height:35rem">
        @yield('content')
    </main>

    @includeIf('layouts.footer')

</body>

</html>
