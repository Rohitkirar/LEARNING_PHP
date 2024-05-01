@extends('layouts.admin')

@section('title' , "Edit Role")

@section('content')


<div class="d-flex">
    {{-- create role form --}}
<div class="col-sm-4 shadow-lg bg-white p-4 m-2">
    <x-roles.admin-edit-role :$role />
</div>

    {{-- show permission table --}}
<div class="col-sm-8 shadow-lg bg-white p-4 m-2">
    <x-roles.admin-role-permission :$role/>
</div>

</div>

<div class="col-sm-8 shadow-lg bg-white p-4 m-2">
    <x-roles.admin-attach-permission :$permissions :$role/>
</div>

@endsection