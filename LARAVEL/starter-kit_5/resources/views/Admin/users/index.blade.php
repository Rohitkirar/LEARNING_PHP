
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
            $("#user_table").DataTable({
                processing:true,
                serverSide:true,
                ajax: "{{route('users.index')}}" ,
                columns: [
                    {
                        data: 'DT_RowIndex' ,
                        name: 'DT_RowIndex',
                        orderable: false ,
                        searchable: false
                    },
                    {
                        data:'avatar',
                        searchable:false,
                        orderable:false
                    },                    
                    {
                        data:'name',
                        name:"first_name"
                    },
                    {
                        data:'username',
                    },
                    {
                        data:'email', 
                    },
                    {
                        data:'phone_number',
                    },
                    {
                        data: 'created_at', 
                    },
                    {
                        data: "deleted_at",
                    },
                    {
                        data : "action"
                    }
                ]
            });
        });
    </script>
@endsection

@section('content')
{{-- 
    <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Lists /</span> User
    </h4> 
--}}

<!-- Scrollable -->
<div class="card p-2">
  <h5 class="card-header">Users</h5>
  <div class="card-datatable text-nowrap">
    <table id="user_table" class="table">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>created_at</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
  </div>
</div>
<!--/ Scrollable -->

@endsection


