<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <title>
        @yield("title")
    </title>
</head>
<body>
    
    @if(View::exists('navbar'))
        @include('navbar')
    @endif

    <main>
        @yield("main")
    </main>

    @if(View::exists('footer'))
        @include('footer');
    @endif

</body>
</html>