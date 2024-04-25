<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>
            @yield('title')
        </title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <nav class="navbar navbar-expand-lg" style="background-color:grey ; max-height:3rem">  

            <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
                <img src="{{asset('Upload/snapchat.png')}}" style="width:25% ; height:25%;" alt="logo">
                <span  style="color:white">ɮʟօɢ</span>
            </a>

            <div class="container"  style="justify-content: space-between">
                <div class="d-flex">
                    <a class="nav-link text-white"  href="/">Home</a>
                
                    <a class="nav-link text-white" href="#">About</a>
                </div>
    
                @auth
                    <div class="d-flex">
                        <a class="nav-link text-white"  href="{{route('dashboard')}}">Dashboard</a>
                    </div>
                @endauth
                
                @guest
                    <div class="d-flex">
                        <a class="nav-link text-white"  href="{{route('login')}}">Login</a>
                    
                        <a class="nav-link text-white" href="{{route('register')}}">Register</a>
                    </div>
                @endguest
            </div>
        </nav>        

        <main style="min-height:35rem">
            @yield('content')
        </main>

        @includeIf('layouts.footer')
    </body>
</html>
