
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    
    <a class="navbar-brand" style="width:10% ; height:10%;" href="#">
        <img src="{{asset('Upload/snapchat.png')}}" style="width:25% ; height:25%;" alt="logo">
        <span  style="color:white">ɮʟօɢ</span>
    </a>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link"  style="color:white" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="{{route('about')}}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="{{route('users.create')}}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="{{route('users.login')}}">Login</a>
            </li>
        </ul>
    </div>
</nav>

