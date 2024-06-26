
@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-select-bs5/select.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css')}}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/tables-datatables-extensions.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js" ></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
    <script>
        $(document).ready(function(){
            $("#page_table").DataTable({
                processing:true,
                serverSide: true,
                ajax: "{{route('pages.index')}}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , searchable:false , orderable:false },
                    { data: 'images.path', name: 'images.path' , searchable:false , orderable:false},
                    { data: 'title', name: 'title' },
                    { data: 'description', name: 'description' },
                    { data: 'moral', name: 'moral' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endsection

@section('content')


<!-- Scrollable -->
<div class="card p-2">

    <div class="d-flex justify-content-between">
        <h5 class="card-header">Pages</h5>

    </div>

    <div class="card-body text-wrap">
        <table id="page_table"  class="table">
            <thead>
                <th>S.No</th>
                <th>Image</th>
                <th>Page Title</th>
                <th>Description</th>
                <th>Moral</th>
                <th>Created_at</th>
                <th>Action</th>
            </thead>
        </table>
    </div>
</div>
<!--/ Scrollable -->


@endsection


