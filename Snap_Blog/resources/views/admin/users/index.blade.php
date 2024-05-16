@extends('layouts.admin')

@section('title', 'users')

@section('content')
    <div class="mx-5" style="">

        <div class="d-flex card-header justify-content-between align-items-center my-4">
            <h4 class="">Users Data</h4>
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Add New User</a>
        </div>
        
        <x-users.user-datatable />
    </div>
@endsection
