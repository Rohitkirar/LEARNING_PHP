@extends('layouts.admin')

@section('title', 'roles')

@section('content')

    <div class="d-flex">
            {{-- create role form --}}
        <div class="col-sm-4 shadow-lg bg-white p-4 m-2">
            <x-roles.admin-create-role />
        </div>

            {{-- show role table --}}
        <div class="col-sm-8 shadow-lg bg-white p-4 m-2">
            <x-roles.admin-role-table :$roles />
        </div>

    </div>

@endsection
