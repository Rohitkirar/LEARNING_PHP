<nav class="navbar navbar-expand-lg p-1 card-header bg-light border position-fixed w-100" style=" top:0" >

    <a class="navbar-brand" style="width:10% ;" href="{{ route('home') }}">
        <img src="{{ asset('storage/uploads/snapchat.png') }}" style="width:20% ;" alt="logo">
        <span style="color:black">ɮʟօɢ</span>
    </a>

    @auth
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

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

        </div>

        <div class="btn-group">

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
        </div>
    @endauth

</nav>
