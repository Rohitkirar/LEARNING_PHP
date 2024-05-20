@extends('layouts.admin')

@section("title" , "comments")

@section('content')

    <div class="d-flex card-header justify-content-between align-items-center mx-5 my-4">
        <h4 class="">Comments Data</h4>
    </div>
    <div class="mx-5" style="">
        <x-comments.comment-index />
    </div>
@endsection