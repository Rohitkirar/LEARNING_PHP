@extends('layouts.admin')

@section('title', 'users')

@section('content')

    <div class="d-flex text-center">
        <div class="bg-white border-end w-25">
            <p>Active Users <span class="fs-5">{{$users}}</span></p>
        </div>
        <div class="bg-white border-end w-25">
            <p>Total Posts <span class="fs-5">{{$posts}}</span></p>
        </div>
        <div class="bg-white border-end w-25">
            <p>Total Comments <span class="fs-5">{{$comments}}</span></p>
        </div>
        <div class="bg-white w-25">
            <p>Total Likes <span class="fs-5">{{$likes}}</span></p>
        </div>
    </div>

@endsection
