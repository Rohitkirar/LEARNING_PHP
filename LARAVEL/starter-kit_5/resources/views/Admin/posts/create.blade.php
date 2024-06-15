@extends('layouts/layoutMaster')

@section('title', ' Horizontal Layouts - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
    <script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection

@section('content')
 
 <!-- Form Separator -->
  <div class="col-xxl">
    <div class="card mb-4">
      <h5 class="card-header">Create Post</h5>
      <form class="card-body">
        <h6 class="mb-b fw-semibold">1. Post Details</h6>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label" for="multicol-username">Title</label>
          <div class="col-sm-9">
            <input type="text" id="multicol-username" class="form-control" name="title" placeholder="john.doe" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label" for="multicol-category">Category</label>
          <div class="col-sm-9">
            <select id="multicol-category" class="select2 form-select" data-allow-clear="true">
                <option value="">Select</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
          </div>
        </div>

        <hr class="my-4 mx-n4" />

        <h6 class="mb-3 fw-semibold">2. Page Description</h6>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label" for="multicol-full-name">Page Title</label>
          <div class="col-sm-9">
            <input type="text" id="multicol-full-name" name="sub-title" class="form-control" placeholder="page title" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label" for="multicol-description">Description</label>
          <div class="col-sm-9">
            <textarea name="description" id="multicol-description" class="form-control" cols="30" rows="10"></textarea>
          </div>
        </div>

        <div class="row">
          <label class="col-sm-3 col-form-label" for="multicol-image">Images</label>
          <div class="col-sm-9">
            <!-- Multi  -->
                <div class="card">
                <h5 class="card-header">Multiple</h5>
                <div class="card-body">
                    <form action="/upload" class="dropzone needsclick" id="dropzone-multi">
                        <div class="dz-message needsclick">
                            Drop files here or click to upload
                            <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" />
                        </div>
                    </form>
                </div>
                </div>
            <!-- Multi  -->
          </div>
        </div>
        <div class="pt-4">
          <div class="row justify-content-end">
            <div class="col-sm-9">
              <button type="submit" class="btn btn-primary me-sm-2 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary">Cancel</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection


