
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
                ajax: "{{route('categories.index')}}",
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
        <h5 class="card-header">Categories</h5>
        <!-- Form with Image Modal -->
        <button type="button" class="btn btn-primary align-center m-4" style="height:1%" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
            <i class="fa-solid fa-plus mx-1"></i> Create Category
        </button>
        <!--/ Form with Image Modal -->
    </div>

    <div class="card-datatable text-nowrap">
        <table id="category_table"  class="table">
            <thead>
                <th>S.No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
        </table>
    </div>
</div>
<!--/ Scrollable -->

<!-- Form with Image Modal -->
<div class="modal-onboarding modal fade animate__animated" id="onboardImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("categories.store")}}" enctype="multipart/form-data" method="POST">
            @csrf
                <div class="modal-body p-0">
                    <div class="onboarding-content mb-0">                   
                        <h4 class="onboarding-title text-center text-body">Create New Category</h4>
                
                        <div class="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{old('name' , '')}}"  id="name" placeholder="category name">
                                @error("name")
                                    <p class="text-danger">{{$errors->first('name')}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" id="image" value="{{old("image" , "")}}" name="image" class="form-control" >
                                @error("image")
                                    <p class="text-danger">{{$errors->first('image')}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/ Form with Image Modal -->

@endsection


