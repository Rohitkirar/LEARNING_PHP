@extends('layouts.admin')

@section('title', 'View User')

@section('content')

    <p class="page-header">User Profile</p>

    <div class="shadow-lg p-5 mt-5 mb-5 border" style="margin: 0 auto ; width:50%">

        @isset($user)
            <x-users.show-user :$user />
        @endisset

    </div>

@endsection
