<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>
        @yield("title")
    </title>

</head>
<body>
    
    <nav>
        @yield('navbar')
    </nav>

    <main>
        @yield('main')
    </main>

    <footer>
        @yield('footer')
    </footer>
    
</body>
</html>