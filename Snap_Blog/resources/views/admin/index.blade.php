@extends('layouts.admin')

@section('title', 'users')

@section('content')

    <div class="d-flex ">
        <div class="card  w-50">
            <p>Active User <span class="fs-5">{{$users}}</span></p>
        </div>
        <div class="card  w-50">
            <p>Total Post <span class="fs-5">{{$posts}}</span></p>
        </div>
    </div>

@endsection
