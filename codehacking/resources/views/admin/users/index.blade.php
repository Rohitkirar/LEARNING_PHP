@extends('layouts.admin')

@section('title', 'users')

@section('content')

    <h1 class="page-header">User Dashboard</h1>

    <div>
        <x-users.users-datatable :$users />
    </div>

@endsection
