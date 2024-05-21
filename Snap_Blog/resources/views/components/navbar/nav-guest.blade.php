<nav class="navbar navbar-expand-lg p-1 card-header bg-light border fixed-top w-100" style=" top:0">  

    <a class="navbar-brand p-0 m-0" style="width:10% ;" href="{{route("home")}}">
        <img src="{{asset('storage/uploads/snapchat.png')}}" style="width:20% ;" alt="logo">
        <span style="color:black">ɮʟօɢ</span>
    </a>

    <div class="container"  style="justify-content: space-between">

        <div class="d-flex">
            <a class="nav-link" style="color:black"  href="{{route("home")}}">Home</a>
        
            <a class="nav-link" style="color:black" href="#">About</a>
        </div>

        @guest
            <div class="d-flex">
                <a class="nav-link" style="color:black"  href="{{route('login')}}">Login</a>
            
                <a class="nav-link" style="color:black" href="{{route('register')}}">Register</a>
            </div>
        @endguest


        @auth
            <div class="d-flex">
                <a class="nav-link" style="color:black"  href="{{route('users.dashboard')}}">Dashboard</a>
            </div>
        @endauth
        

    </div>

</nav>