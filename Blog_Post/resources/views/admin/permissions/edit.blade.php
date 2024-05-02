@extends('layouts.admin')

@section('title' , 'permissions')

@section('content')

    <div>
        <x-permissions.admin-edit-permission :$permission />
    </div>

@endsection