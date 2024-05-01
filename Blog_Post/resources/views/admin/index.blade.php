@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    @if(auth()->user()->userHasRole('admin'))
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    @endif

@endsection

