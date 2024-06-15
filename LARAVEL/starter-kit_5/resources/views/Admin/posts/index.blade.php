
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
            $("#category_table").DataTable({
                processing:true,
                serverSide: true,
                ajax: "{{route('admin.categories')}}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , searchable:false , orderable:false },
                    { data: 'image', name: 'image' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'deleted_at', name:'deleted_at' },
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
        <h5 class="card-header">Posts</h5>
        <!-- Form with Image Modal -->
        <a href="{{route("admin.posts.create")}}" class="btn btn-primary align-center m-4" style="height:1%" >
            <i class="fa-solid fa-plus mx-1"></i> Create Post
        </a>
        <!--/ Form with Image Modal -->
    </div>

    <div class="card-datatable text-nowrap">
        <table id="category_table"  class="table">
            <thead>
                <th>S.No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Created_at</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
        </table>
    </div>
</div>
<!--/ Scrollable -->


@endsection


