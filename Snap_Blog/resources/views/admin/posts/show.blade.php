@extends('layouts.admin')

@section('title' , "show post")

@section('content')

<div class="container mt-2" style="width:50%">
  @isset($post)
    <x-posts.show-post :$post />
  @endisset
</div>


@endsection