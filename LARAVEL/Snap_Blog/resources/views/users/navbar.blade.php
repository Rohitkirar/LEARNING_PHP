
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
                <a class="nav-link"  style="color:white" href="{{route('users.edit' , Auth::user()->id)}}">Edit Details</a>
            </li>

            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="/updatepassword">Change Password</a>
            </li>

            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="{{route('users.show' , Auth::user()->id)}}">Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link"  style="color:white" href="{{route('posts.create')}}">Create Post</a>
            </li>

        </ul>

    </div>

    <div class="d-flex" style="color:white">
        
        <div class="p-1">Welcome, {{ Auth::user()->first_name   . " " . Auth::user()->last_name}} </div>

        <a class="my-2 my-sm-0" href="{{route('logout')}}"><img src="../../Upload/icons8-logout-32.png" style="height: 100% ; width:100%;" alt=""></a>
    
    </div>

</nav>    
