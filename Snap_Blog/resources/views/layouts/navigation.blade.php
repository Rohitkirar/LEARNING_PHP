
<nav class="navbar navbar-expand-lg navbar-light bg-dark">  

    <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
        <img src="{{asset('Upload/snapchat.png')}}" style="width:25% ; height:25%;" alt="logo">
        <span  style="color:white">ɮʟօɢ</span>
    </a>

    @guest
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
    @endguest

    @auth  
        <div class="collapse navbar-collapse"  id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link"  style="color:white" href="{{route('users.index')}}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="{{route('posts.index')}}">All Posts</a>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="{{route('users.edit' , Auth::user()->id)}}">Edit Details</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="/updatepassword">Change Password</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="{{route('profile.edit')}}">Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"  style="color:white" href="{{route('posts.create')}}">Create Post</a>
                </li>

            </ul>

        </div>

        <div class="d-flex" style="color:white">
            
            <p class="p-1">Welcome, {{ Auth::user()->first_name   . " " . Auth::user()->last_name}} </p>
            <div>
                {!! Form::open(['route'=>'logout' , 'method'=>'post']) !!}

                {!! Form::submit('logout' , [ 'class'=>"btn btn-danger p-1  " ]) !!}

                {!! Form::close() !!}
            </div>
        
        </div>
    @endauth
    
</nav>    
