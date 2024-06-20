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
    <span class="text-muted fw-light">Post /</span> Edit
  </h4>

  
<x-post-nav :$post />

  <div class="col-md">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="d-flex justify-content-between">
                <h5 class="card-header">Pages</h5>
                <!-- Form with Image Modal -->
                <a href="{{route("pages.create" , $post->id)}}" class="btn btn-primary align-center m-4"  >
                    <i class="fa-solid fa-plus mx-1"></i> New Page
                </a>
                <!--/ Form with Image Modal -->
            </div>           

            {{-- <div class="col-md-4"> --}}
                {{-- <img class="card-img card-img-left" src="{{$post->images->first()->path}}" alt="Card image" /> --}}
            {{-- </div> --}}
            <div class="">
                <div class="card-body">
                    @if(count($pages))   
                        <div class="container ">
                            @foreach($pages as $page)
                                <div class="card h-100 w-50 mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Title : {{$page->title}}</h5>
                                        {{-- <h6 class="card-subtitle text-muted">Subtitle : {{$page->subtitle}}</h6> --}}
                                    </div>
                                    <div class="text-center">
                                      <img class="img-fluid" width="50%" src="{{$page->images->first()->path}}" alt="Card image cap" />
                                    </div>
                                    <div class="card-body">
                                      <div>
                                        <h6 > Description : </h6>
                                        <p class="form-control"> {{$page->description}}</p>
                                      </div>
                                      <div>
                                        <h6 >Moral</h6>
                                        <p class="form-control">{{$page->moral}}</p>
                                      </div>
                                      <a href="javascript:void(0);" class="card-link">Another link</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>      
                    @else
                        <div>
                            <p class="text-muted text-center">No Pages Found</p>             
                        </div>     
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div>
      
    
    </div>
  </div>

@endsection