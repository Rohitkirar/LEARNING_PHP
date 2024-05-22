<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>
            @yield('title')
        </title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js' , 'resources/sass/app.scss' ])

    </head>
    <body class="font-sans text-gray-900 antialiased">

        <x-navbar.nav-guest />

        <main style="min-height:35rem ; margin-top:5rem">
            @yield('content')
        </main>

        @includeIf('layouts.footer')
    </body>
</html>
