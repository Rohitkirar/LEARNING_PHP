@extends('layouts.admin')

@section("title" , "Create User");

@section("content")

    <p class="page-header">Create User</p>

    <div class="shadow-lg p-5 mt-5 mb-5 border" style="margin: 0 auto ; width:50%">
        <x-users.create-user />
    </div>

@endsection
