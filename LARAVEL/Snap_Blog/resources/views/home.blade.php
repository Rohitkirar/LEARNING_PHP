@extends('layouts.app')

@section('title')
    Home
@endsection

@section('main')
    <section class="jumbotron text-center ">
        <div class="container shadow-lg mt-5 p-3 mb-5 bg-white rounded " style="height:25rem ; ">
            <h1 class="jumbotron-heading">Join millions of others</h1>
            <p class="lead text-muted">
                Whether sharing your expertise, breaking news, or whatever’s on your mind,
                you’re in good company on Blogger. Sign up to discover why millions of people have published their passions
                here.
            </p>
            <p>
                <a href="{{route('login')}}" class="btn btn-primary my-2">login here</a>
                <a href="{{route('users.create')}}" class="btn btn-secondary my-2">Register</a>
            </p>
        </div>
        <div class="container shadow-lg mt-5 p-3 mb-5 bg-white rounded "
            style="background-color: whitesmoke; height:25rem ; ">
            <div>
                <img src="Upload/snapchat.png" style="width:5% ;" alt="logo">
                <span style="font-size:xx-large;">ɮʟօɢ</span>
            </div>
            <p class="lead text-muted">
                A Snap blog is an online journal that displays information on a variety of topics.
                The blog is a shortened version of “ weblog ” which means web blog.
            </p>
        </div>
    </section>
@endsection
