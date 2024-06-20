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
    <span class="text-muted fw-light">Page /</span> Edit
  </h4>

  
<x-page-nav :$page />

  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4 p-5">

          @php $images = $page->images ; $edit = true; @endphp
          <x-image-slider :$images :$edit />
          
          {{-- <img class="card-img card-img-left" src="{{$page->images->first()->path}}" alt="Card image" /> --}}
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <form class="card-body" action="{{route("pages.update" , $page->id)}}" enctype="multipart/form-data" method="POST">
              @csrf @method("put")
              <h6 class="mb-b fw-semibold">Page Details</h6>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="multicol-username">Title</label>
                <div class="col-sm-9">
                  <input type="text" id="multicol-username" class="form-control" value="{{old('title' , $page->title)}}" name="title" placeholder="john.doe" />
                  @error("title")
                    <p class="text-danger">{{ $errors->first('title')}}</p>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="multicol-description">Description</label>
                <div class="col-sm-9">
                  <textarea name="description" id="multicol-description" class="form-control" placeholder="Description about post" cols="30" rows="10">{{old('description' , $page->description)}}</textarea>
                  @error("description")
                    <p class="text-danger">{{ $errors->first('description')}}</p>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="multicol-moral" >Moral</label>
                <div class="col-sm-9">
                  <input type="text" name="moral" id="multicol-moral" value="{{old('moral' , $page->moral)}}" placeholder="Type the moral of the story" class="form-control" />
                  @error("moral")
                    <p class="text-danger">{{ $errors->first('moral')}}</p>
                  @enderror
                </div>
              </div>

              <div class="row">
                <label class="col-sm-3 col-form-label" for="multicol-image">Images</label>
                <div class="col-sm-9">
                  <!-- Multi  -->
                    <div class="card">
                      <div class="card-body">

                        <div class="fallback">
                            <input name="file[]" type="file" value="{{old('file' , $page->images->pluck("path"))}}" multiple/>
                        </div>
                      </div>
                      
                    </div>
                        @error("file")
                          <p class="text-danger ">{{$errors->first("file")}}</p>
                        @enderror
                  <!-- Multi  -->
                </div>
              </div>

              <div class="p-4">
                <div class="row justify-content-end">
                  <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary me-sm-2 me-1">Update</button>
                    <button type="reset" class="btn btn-label-secondary">Reset</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div>
{{--       
    @if($page->deleted_at)
        <div class="card">
            <h5 class="card-header">Restore Post</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h5 class="alert-heading mb-1">Restore post Data?</h5>
                </div>
                </div>
                <form  action="{{route("posts.restore" , $page->id)}}" method="post">
                    @csrf
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="accountActivation" required id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">Confirm </label>
                    </div>
                    <button type="submit" class="btn btn-success deactivate-account">Recover Post</button>
                </form>
            </div>
        </div>
    @else
        <div class="card">
            <h5 class="card-header">Delete Post</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h5 class="alert-heading mb-1">Delete post data?</h5>
                </div>
                </div>
                <form  action="{{route("posts.destroy" , $page->id)}}" method="post">
                    @csrf @method("DELETE")
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="accountActivation" required id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">Confirm</label>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">Delete Post</button>
                </form>
            </div>
        </div>
    @endif --}}
    </div>
  </div>

@endsection