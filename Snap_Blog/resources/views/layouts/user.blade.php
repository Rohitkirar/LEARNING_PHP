<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    
    <title>
        @yield('title')
    </title>
</head>
<body>
        
    
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">  

        <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
            <img src="{{asset('Upload/snapchat.png')}}" style="width:25% ; height:25%;" alt="logo">
            <span  style="color:white">ɮʟօɢ</span>
        </a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link"  style="color:white" href="{{route('users.index')}}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="{{route('posts.index')}}">All Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="/updatepassword">Change Password</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="{{route('users.show' , Auth::id())}}">Profile</a>
                </li>
                
                {{-- <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="{{route('users.edit' , Auth::id())}}">Edit Details</a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="{{route('posts.create')}}">Create Post</a>
                </li> --}}

            </ul>

        </div>

        <div class="d-flex" style="color:white">
            
            <div class="p-1">Welcome, {{ Auth::user()->first_name   . " " . Auth::user()->last_name}} </div>

            {!! Form::open(['method'=>"POST" , "route"=>"logout" ]) !!}

            {!! Form::submit("Logout" , [ "class"=>"btn btn-danger p-1"] )!!}
            
            {!! Form::close() !!}
        
        
        </div>

    </nav>    

    <main>
        @yield("main")
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  
</body>
</html>