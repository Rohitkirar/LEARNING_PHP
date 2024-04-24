<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>
        @yield('title')
    </title>

</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            
            <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
                <img src="{{asset('Upload/snapchat.png')}}" style="width:25% ; height:25%;" alt="logo">
                <span  style="color:white">ɮʟօɢ</span>
            </a>

            <div class="collapse navbar-collapse"  id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link"  style="color:white" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  style="color:white" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  style="color:white" href="{{route('users.create')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  style="color:white" href="{{route('login')}}">Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('main')
        </main>

        
        <footer class="bg-white d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top w-100" style="bottom:0;">
            
            <div class="col-md-4 d-flex align-items-center">

                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                </a>

                <strong class="mb-3 mb-md-0" style="font-size:12px">&copy; <?php echo DATE('Y') ?> Snap Blog, Company Inc</strong>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <strong class="card p-1 m-1" style="font-size:12px"><a style="text-decoration:none" href="#">Instagram</a></strong>
                <strong class="card p-1 m-1" style="font-size:12px"><a style="text-decoration:none" href="#">linkedln</a></strong>
                <strong class="card p-1 m-1" style="font-size:12px"><a style="text-decoration:none" href="#">Youtube</a></strong>
            </ul>
            
        </footer>
    </div>
</body>
</html>
