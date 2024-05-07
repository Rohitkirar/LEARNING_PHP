@extends('layouts.admin')

@section("title" , "Edit User");

@section("content")

    <h4 class="page-header">Edit User</h4>

    <div class="shadow-lg p-5 mt-5 mb-5 border" style="margin: 0 auto ; width:50%">
        <x-users.edit-user :$user />
    </div>

@endsection
