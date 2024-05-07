@extends('layouts.admin')

@section('title', 'users')

@section('content')

    <h4 class="page-header">User Dashboard</h4>

    <div>
        <x-users.users-datatable :$users />
    </div>

@endsection
