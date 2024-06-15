@extends('layouts/layoutMaster')

@section('title', 'User Profile - Profile')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
@endsection

<!-- Page -->
@section('page-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection


@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
  <script src="{{asset('assets/js/pages-profile.js')}}"></script>
@endsection

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Category /</span> Edit
  </h4>

  
  <!-- Navbar pills -->
  <div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-sm-row mb-4">
            <li class="nav-item"><a class="nav-link " href="{{route('admin.categories.show' , $category->id)}}"><i class='ti-xs ti ti-user-check me-1'></i> Category</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{route('admin.categories.edit' , $category->id)}}"><i class='ti-xs ti ti-users me-1'></i> Edit</a></li>
        </ul>
    </div>
  </div>
  <!--/ Navbar pills -->

  <div class="container mx-5">
    <form action="{{route("admin.categories.update" , $category->id)}}" enctype="multipart/form-data" method="POST" >
        @method("put") @csrf

        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" id="name" name="name" value="{{old("name" , $category->name)}}" class="form-control" />
                    @error("name")
                        <p class="text-muted text-danger">{{$errors->first("name")}}</p>
                    @enderror
                </div>
                <img class="img-fluid" src="{{$category->image}}" alt="Card image cap" />
                <div class="card-body">
                    <label for="image" class="form-label">Add New Image</label>
                    <input type="file"  class="form-control" name="image" value="{{old("image")}}">
                    @error("image")
                        <p class="text-muted text-danger">{{$errors->first("image")}}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mx-4 mb-3">
                    <button type="submit" class="btn btn-success w-100 m-2">Update</button>
                    <button type="reset" class="btn btn-danger w-100 m-2">reset</button>
                </div>
            </div>

        </div>
    </form>
  </div>

  
    @if($category->deleted_at)
        <div class="card">
            <h5 class="card-header">Restore Category</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h5 class="alert-heading mb-1">Restore category Data?</h5>
                </div>
                </div>
                <form  action="{{route("admin.categories.restore" , $category->id)}}" method="post">
                    @csrf
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="accountActivation" required id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">Confirm </label>
                    </div>
                    <button type="submit" class="btn btn-success deactivate-account">Restore</button>
                </form>
            </div>
        </div>
    @else
        <div class="card">
            <h5 class="card-header">Delete Category</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h5 class="alert-heading mb-1">Delete category data ?</h5>
                </div>
                </div>
                <form  action="{{route("admin.categories.destroy" , $category->id)}}" method="post">
                    @csrf @method("DELETE")
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="accountActivation" required id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">Confirm</label>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">Delete Category</button>
                </form>
            </div>
        </div>
    @endif
@endsection