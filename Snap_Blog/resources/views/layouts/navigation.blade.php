
<nav class="navbar navbar-expand-lg bg-secondary">  

    <a class="navbar-brand p-0 m-0" style="width:10% ;" href="{{route("home")}}">
        <img src="{{asset('Upload/snapchat.png')}}" style="width:24% ;" alt="logo">
        <span  style="color:white">ɮʟօɢ</span>
    </a>

    @guest
        <div class="container"  style="justify-content: space-between">
            <div class="d-flex">
                <a class="nav-link text-white"  href="/">Home</a>
            
                <a class="nav-link text-white" href="#">About</a>
            </div>

            <div class="d-flex">
                <a class="nav-link text-white"  href="{{route('login')}}">Login</a>
            
                <a class="nav-link text-white" href="{{route('register')}}">Register</a>
            </div>


            @auth
                <div class="d-flex">
                    <a class="nav-link text-white"  href="{{route('users.index')}}">Dashboard</a>
                </div>
            @endauth
            

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

