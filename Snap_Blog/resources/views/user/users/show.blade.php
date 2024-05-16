@extends('layouts.app')

@section('title', 'profile')

@section('content')

    <div class="container my-3" style="width:90%">

        <x-users.user-profile :$user  />

    </div>
@endsection
