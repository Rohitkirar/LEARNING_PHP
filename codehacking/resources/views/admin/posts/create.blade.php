@extends('layouts.admin')

@section("title" , "Create Post");

@section("content")

    <h4 class="page-header">Create Post</h4>

    <div class="shadow-lg p-5 mt-5 mb-5 border" style="margin: 0 auto ; width:50%">
        @isset($categories)
            <x-posts.create-post  :$categories  />
        @endisset
    </div>

@endsection
