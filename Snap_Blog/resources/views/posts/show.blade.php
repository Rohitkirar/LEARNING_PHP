@extends('layouts.app')

@section('title' , "show post")

@section('content')

<div class="mx-5 mt-2" style="width:70%">
  @isset($post)
    <x-posts.show-post :$post />
  @endisset
</div>


@endsection