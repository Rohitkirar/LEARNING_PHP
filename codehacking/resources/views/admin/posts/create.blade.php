@extends('layouts.admin')

@section("title" , "Create Post");

@section("content")

    <p class="page-header">Create Post</p>

    <div class="shadow-lg p-5 mt-5 mb-5 border" style="margin: 0 auto ; width:50%">
        <x-users.create-post />
    </div>

@endsection
