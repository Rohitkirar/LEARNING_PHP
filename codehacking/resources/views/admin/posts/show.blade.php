@extends('layouts.admin')

@section('title', 'View Post')

@section('content')

    <h4 class="page-header">Post View</h4>

    <div class="shadow-lg p-5 mt-5 mb-5 border" style="margin: 0 auto ; width:50%">

        @isset($post)
            <x-posts.show-post :$post />
        @endisset

    </div>

@endsection
