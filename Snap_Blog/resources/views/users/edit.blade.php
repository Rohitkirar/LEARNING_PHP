@extends('layouts.app')

@section('title', 'edit user profile')

@section('content')

    <div class="container my-2" style="width:60%">

        <x-users.edit-user :$user  />

    </div>
@endsection
