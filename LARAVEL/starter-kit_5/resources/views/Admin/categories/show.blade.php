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
    <span class="text-muted fw-light">Category /</span> Show
  </h4>

  
<x-category-nav :$category  />

  <div class="container mx-5">
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Title : {{$category->name}}</h5>
                {{-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> --}}
            </div>
            <img class="img-fluid" src="{{$category->image}}" alt="Card image cap" />
            <div class="card-body">
                {{-- <p class="card-text">Bear claw sesame snaps gummies chocolate.</p> --}}
                <a href="{{route("categories.edit" , $category->id)}}" class="card-link">Edit</a>
                {{-- <a href="javascript:void(0);" class="card-link">Another link</a> --}}
            </div>
        </div>
    </div>
  </div>


@endsection