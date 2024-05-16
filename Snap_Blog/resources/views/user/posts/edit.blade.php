@extends('layouts.app')

@section('title') create post @endsection

@section('content')

    <div class="container w-50 p-4 border mt-5 bg-white" >
        @isset($post)
            <x-posts.edit-post :$post />
        @endisset
    </div>

@endsection