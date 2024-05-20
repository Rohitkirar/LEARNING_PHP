<nav class="navbar navbar-expand-lg p-1 card-header bg-light border w-100 justify-content-between" style=" top:0">

    <div class="d-flex align-items-center">
        <a class="navbar-brand" style="width:14% ;" href="{{ route('home') }}">
            <img src="{{ asset('storage/uploads/snapchat.png') }}" style="width:20% ;" alt="logo">
            <span style="color:black">ɮʟօɢ</span>
        </a>

        <div class=" mx-5">
            <a href="{{route("admin.dashboard")}}" class="mx-1 text-dark text-decoration-none"><i class="bi bi-house-door fs-5"></i> Home</a>
            <a href="{{route("admin.users.index")}}" class="mx-1 text-dark text-decoration-none"><i class="bi bi-people fs-5"></i> Users</a>
            <a href="{{route("admin.posts.index")}}" class="mx-1 text-dark text-decoration-none"><i class="bi bi-file-post-fill fs-5"></i> Posts</a>
            <a href="{{route("admin.comments.index")}}" class="mx-1 text-dark text-decoration-none"><i class="bi bi-file-post-fill fs-5"></i> Comments</a>
        </div>
    </div>

    <div class="mx-3">
        <button class="bg-transparent" style="border:none"><i class="bi bi-chat-left fs-4 "></i></button>
        <button class="bg-transparent" style="border:none"><i class="bi bi-bell fs-3 "></i></button>
    </div>

</nav>


{{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav">

<li class="nav-item ">
<a class="nav-link" style="color:black"  href="{{ route('users.index') }}">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" style="color:black" href="{{ route('posts.index') }}">Explore</a>
</li>

<li class="nav-item">
<a class="nav-link" style="color:black" href="{{ route('posts.create') }}">Create Post</a>
</li>

</ul>

</div> --}}

{{-- <div class="btn-group">

<span>Welcome, {{ Auth::user()->fullname() }}</span>

<span type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
aria-expanded="false"></span>

<ul class="dropdown-menu">
<li>
<a class="nav-link" style="color:black" href="{{ route('profile.edit') }}">Profile</a>
</li>
<li>
{!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
{!! Form::submit('logout', [
'class' => 'nav-link text-danger',
'style' => 'border:none; background-color:transparent',
]) !!}
{!! Form::close() !!}
</li>
</ul>
</div> --}}
