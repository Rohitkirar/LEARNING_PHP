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
    <span class="text-muted fw-light">Post /</span> Show
  </h4>

  
  <x-post-nav :$post />

  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="{{$post->images->first()->path}}" alt="Card image" />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <div>
                <h5 class="card-title">Title </h5>
                <p class="form-control">{{$post->title}}</p>
            </div>            
            <div>
                <h5 class="card-title">Category </h5>
                <p class="form-control">@if($post->category) {{$post->category->name}} @else null @endif</p>
            </div>
            <div>
                <h5 class="card-title">Description</h5>
                <p class="form-control">{{$post->description}}</p> 
            </div>    
            <div>
                <h5 class="card-title">Moral</h5>
                <p class="form-control">{{$post->moral}}</p>
            </div>
            <p class="card-text"><small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection