@extends('layouts.admin')

@section('title', 'users')

@section('content')

    {{-- Flash Messages using session flash --}}

    @if (session('user-delete-success'))
        <p class="alert alert-danger">{{ session('user-delete-success') }}</p>
    @elseif(session('user-create-success'))
        <p class="alert alert-success">{{ session('user-create-success') }}</p>
    @elseif(session('user-update-success'))
        <p class="alert alert-success">{{ session('user-update-success') }}</p>
    @endif

    {{-- Users Details Table --}}
    <x-users.users-details :$users />

    {{-- page level scripts for datatables --}}
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection

@endsection
