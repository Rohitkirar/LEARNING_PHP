@extends('layouts.admin')

@section('title', 'posts')

@section('content')

    <h1 class="page-header">All Posts</h1>

    <div>
        <x-posts.posts-datatable :$posts />
    </div>

@endsection
