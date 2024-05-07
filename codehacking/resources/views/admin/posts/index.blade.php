@extends('layouts.admin')

@section('title', 'posts')

@section('content')

    <h4 class="page-header">All Posts</h4>

    <div>
        <x-posts.posts-datatable :$posts />
    </div>

@endsection
