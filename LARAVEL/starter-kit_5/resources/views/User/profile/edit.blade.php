@extends('layouts/layoutMaster')

@section('title', 'Account settings - Account')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">User Profile /</span> Edit
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
      <li class="nav-item"><a class="nav-link" href="{{route('user.profile.show')}}"><i class="ti-xs ti ti-users me-1"></i> Profile</a></li>
      <li class="nav-item"><a class="nav-link active" href="{{route('user.profile.edit')}}"><i class="ti-xs ti ti-lock me-1"></i> Edit</a></li>
    </ul>
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body"> 

        <form  method="POST" action="{{route("user.profile.update")}}" enctype="multipart/form-data">
            @csrf @method("put")
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                
                <img src="{{$user->avatar}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="ti ti-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" name="avatar" hidden accept="image/png, image/jpeg" />
                    </label>

                    <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                        <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                    @error("avatar")
                        <div class="text-muted text-danger">{{$errors->first('avatar')}}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-0">

            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input class="form-control" type="text" id="firstName" name="first_name" value="{{old("first_name" , $user->first_name)}}" autofocus />
                        @error("first_name")
                            <p class="text-muted text-danger">{{$errors->first('first_name')}}</p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input class="form-control" type="text" id="lastName" name="last_name" value="{{old("last_name" , $user->last_name)}}" />
                        @error("last_name")
                            <p class="text-muted text-danger">{{$errors->first('last_name')}}</p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="DOB" class="form-label">Date Of Birth</label>
                        <input type="text" class="form-control" id="DOB" name="birth_date" value="{{old("birth_date" , $user->birth_date)}}" placeholder="Address" />
                        @error("birth_date")
                            <p class="text-muted text-danger">{{$errors->first('birth_date')}}</p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <input class="form-control" type="text" id="gender" name="gender" value="{{old("gender" , $user->gender)}}" placeholder="California" />
                        @error("gender")
                            <p class="text-muted text-danger">{{$errors->first('gender')}}</p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email" value="{{old("email" , $user->email)}}" placeholder="john.doe@example.com" />
                        @error("email")
                            <p class="text-muted text-danger">{{$errors->first('email')}}</p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="phone_number">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{old("phone_number" , $user->phone_number)}}"/>
                        @error("phone_number")
                            <p class="text-muted text-danger">{{$errors->first('phone_number')}}</p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="bio" class="form-label">Bio</label>
                        <input type="text" class="form-control" id="bio" name="bio" value="{{old("bio" , $user->bio)}}"  />
                        @error("bio")
                            <p class="text-muted text-danger">{{$errors->first('bio')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </div>
        </form>
      </div>
      <!-- /Account -->
    </div>

    @if(!Auth::user()->is_admin)
        <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
            <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
                <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
            </div>
            <form  action="{{route("user.profile.destroy")}}" method="post">
                @csrf @method("DELETE")
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="accountActivation" required id="accountActivation" />
                <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
            </div>
            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
            </form>
        </div>
        </div>
    @endif
  </div>
</div>

@endsection
