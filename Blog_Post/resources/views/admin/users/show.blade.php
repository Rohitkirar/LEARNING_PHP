@extends('layouts.admin')

@section('content')
    @if (session('user_update_success'))
        <div class="alert alert-success">{{ session('user_update_success') }}</div>
    @elseif(session('role_attach_success'))
        <div class="alert alert-success">{{ session('role_attach_success') }}</div>
    @elseif(session('role_detach_success'))
        <div class="alert alert-danger">{{ session('role_detach_success') }}</div>
    @endif


    <x-users.show-user-details :$user />

    @can('viewany', $user)
        <x-users.user-roles :$roles :$user />
    @endcan
@endsection
