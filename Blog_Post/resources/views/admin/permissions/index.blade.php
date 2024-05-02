@extends('layouts.admin')

@section('title', 'permissions')

@section('content')

    <div class="d-flex">

        {{-- create permission form --}}
        
        <x-permissions.admin-create-permission />
        

        {{-- all permissions table --}}

        <x-permissions.admin-permissions-table :$permissions />


    </div>

@endsection
