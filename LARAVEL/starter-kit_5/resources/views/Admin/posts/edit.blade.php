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

  
  <!-- Navbar pills -->
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-sm-row mb-4">
        <li class="nav-item"><a class="nav-link " href="{{route('admin.posts.show' , $post->id)}}"><i class='ti-xs ti ti-user-check me-1'></i> Post</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{route('admin.posts.edit' , $post->id)}}"><i class='ti-xs ti ti-users me-1'></i> Edit</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('admin.posts.pages' , $post->id )}}"><i class='ti-xs ti ti-layout-grid me-1'></i> View Pages</a></li>
        
        {{-- <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-projects')}}"><i class='ti-xs ti ti-layout-grid me-1'></i> Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-connections')}}"><i class='ti-xs ti ti-link me-1'></i> Connections</a></li> --}}
      </ul>
    </div>
  </div>
  <!--/ Navbar pills -->

  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="{{$post->images->first()->path}}" alt="Card image" />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <form class="card-body" action="{{route("admin.posts.update" , $post->id)}}" enctype="multipart/form-data" method="POST">
              @csrf @method("put")
              <h6 class="mb-b fw-semibold">Post Details</h6>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="multicol-username">Title</label>
                <div class="col-sm-9">
                  <input type="text" id="multicol-username" class="form-control" value="{{old('title' , $post->title)}}" name="title" placeholder="john.doe" />
                  @error("title")
                    <p class="text-danger">{{ $errors->first('title')}}</p>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="multicol-category">Category</label>
                <div class="col-sm-9">
                  <select id="multicol-category"  name="category_id" class="select2 form-select" data-allow-clear="true">
                      <option value="">Select</option>
                      @foreach($categories as $category)
                          <option @if(old('category_id' , $post->category_id))  @selected(old('category_id' , $post->category_id) == $category->id) @endif  value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
                  @error("category_id")
                    <p class="text-danger">{{ $errors->first('category_id')}}</p>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="multicol-description">Description</label>
                <div class="col-sm-9">
                  <textarea name="description" id="multicol-description" class="form-control" placeholder="Description about post" cols="30" rows="10">{{old('description' , $post->description)}}</textarea>
                  @error("description")
                    <p class="text-danger">{{ $errors->first('description')}}</p>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="multicol-moral" >Moral</label>
                <div class="col-sm-9">
                  <input type="text" name="moral" id="multicol-moral" value="{{old('moral' , $post->moral)}}" placeholder="Type the moral of the story" class="form-control" />
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
                            <input name="file[]" type="file" value="{{old('file' , $post->images->pluck("path"))}}" multiple/>
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
      
    @if($post->deleted_at)
        <div class="card">
            <h5 class="card-header">Restore Post</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h5 class="alert-heading mb-1">Restore post Data?</h5>
                </div>
                </div>
                <form  action="{{route("admin.posts.restore" , $post->id)}}" method="post">
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
                <form  action="{{route("admin.posts.destroy" , $post->id)}}" method="post">
                    @csrf @method("DELETE")
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="accountActivation" required id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">Confirm</label>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">Delete Post</button>
                </form>
            </div>
        </div>
    @endif
    </div>
  </div>

@endsection