@extends('layouts.guest')

@section('title')
    Home
@endsection

@section('content')

<section class="jumbotron text-center ">
    <div class="border mt-5 m-5 p-3 mb-5 bg-white rounded " style="height:25rem ; ">
        <strong style="font-size:25px">Join millions of others</strong>
        <hr class="mt-3 mb-3">
        <p class="lead text-muted text-justify">
            A Snap blog is an online journal that displays information on a variety of topics.
            The blog is a shortened version of “ weblog ” which means web blog.
        </p>
        <p class="lead text-muted text-justify">
            Whether sharing your expertise, breaking news, or whatever’s on your mind,
            you’re in good company on Blogger. Sign up to discover why millions of people have published their passions
            here.
        </p>
        <p class="mt-2">
            <a href="{{route('login')}}" class="btn btn-primary my-2">login here</a>
            <a href="{{route('users.create')}}" class="btn btn-secondary my-2">Register</a>
        </p>
    </div>

</section>

<x-home-content :$posts :$categories />

@endsection
