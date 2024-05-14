@extends('layouts.app')

@section('title', 'users')

@section('content')

    <div class="d-flex justify-space-between mt-5" style="justify-content: space-between ;">

        <div class="col-lg-2 ">
            <h1>users</h1>
        </div>

        <div class="col-lg-6">

            @isset($posts)
                <x-posts.index-post :$posts />
            @endisset

        </div>

        <div class="col-lg-2">

            <h1>profile</h1>

        </div>


    </div>

@endsection
