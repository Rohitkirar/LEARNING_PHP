@extends('layouts.admin')

@section("title" , "posts")

@section('content')

    <div class="d-flex card-header justify-content-between align-items-center mx-5 my-4">
        <h4 class="">Posts Data</h4>
    </div>
    <div class="mx-5" style="">
        <x-posts.post-datatable />
    </div>
@endsection