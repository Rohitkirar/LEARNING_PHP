@php
  $customizerHidden = 'customizer-hide';
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Register Basic - Pages')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
@endsection

@section('page-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
@endsection

@section('page-script')
  <script src="{{asset('assets/js/pages-auth.js')}}"></script>
  <script src="{{asset('assets/js/forms-pickers.js')}}"></script>
  <script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
@endsection


@section('content')
  <div class="container">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4 ">
        <!-- Register Card -->
        <div class="card" style="width:140%">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4 mt-2">
              <a href="{{url('/')}}" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20,"withbg"=>'fill: #fff;'])</span>
                  <span class="app-brand-text demo text-body fw-bold ms-1">{{config('variables.templateName')}}</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-1 pt-2">Adventure starts here 🚀</h4>
            <p class="mb-4">Make your app management easy and fun!</p>

            <form  class="mb-3" action="{{route("register")}}" enctype="multipart/form-data" method="POST">
              @csrf

              <div class="mb-3">
                <label class="form-label" for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{old("first_name" , "")}}" placeholder="John"/>
                @error('first_name')
                  <p class="text-danger">{{$errors->first('first_name')}}</p>
                @enderror
              </div>          
              
              <div class="mb-3">
                <label class="form-label" for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{old("last_name" , "")}}" placeholder="Doe" />
                @error('last_name')
                  <p class="text-danger">{{$errors->first('last_name')}}</p>
                @enderror
              </div>

              <!-- Datetime Picker-->
              <div class="mb-3">
                <label for="flatpickr-datetime" class="form-label">Date Of Birth</label>
                <input type="text" class="form-control" name="birth_date" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                @error('birth_date')
                  <p class="text-danger">{{$errors->first('birth_date')}}</p>
                @enderror
              </div>
              <!-- /Datetime Picker-->

              <div class="mb-3">
                <label class="d-block form-label" for="gender">Gender</label>
                <div class="d-flex mt-3">
                  <div class="form-check mb-2" style="margin-right:1rem">
                    <input type="radio" id="gender-male" name="gender" value="male" @if(old('gender') == "male") checked @endif class="form-check-input" />
                    <label class="form-check-label" for="gender-male">Male</label>
                  </div>
                  <div class="form-check" style="margin-right:1rem">
                    <input type="radio" id="gender-female" name="gender" value="female" @if(old('gender') == "female") checked @endif class="form-check-input"/>
                    <label class="form-check-label" for="gender-female">Female</label>
                  </div>            
                  <div class="form-check" style="margin-right:1rem">
                    <input type="radio" id="gender-other" name="gender" value="other" @if(old('gender') == "other") checked @endif class="form-check-input" />
                    <label class="form-check-label" for="gender-other">Other</label>
                  </div>
                </div>
                @error('gender')
                  <p class="text-danger">{{$errors->first('gender')}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{old("email" , "")}}" placeholder="john.doe@gmail.com" />
                @error('email')
                  <p class="text-danger">{{$errors->first('email')}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="phone_number">Mobile</label>
                <input type="text" maxlength="12" id="phone_number" class="form-control" name="phone_number" value="{{old("phone_number" , "")}}" placeholder="1234567890" />
                @error('phone_number')
                  <p class="text-danger">{{$errors->first('phone_number')}}</p>
                @enderror
              </div>
              
              <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-control" name="username" value="{{old("username" , "")}}" placeholder="johndoe123" />
                @error('username')
                  <p class="text-danger">{{$errors->first('username')}}</p>
                @enderror
              </div>

              <div class="mb-3 ">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" value="{{old("password" , "")}}" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"  />
                  <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="ti ti-eye-off"></i></span>
                </div>
                @error('password')
                  <p class="text-danger">{{$errors->first('password')}}</p>
                @enderror
              </div>          
              
              <div class="mb-3 ">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" value="{{old("password_confimation" , "")}}" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                  <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="ti ti-eye-off"></i></span>
                </div>
              </div>

              {{-- <div class="mb-3">
                <label class="form-label" for="bs-validation-country">Country</label>
                <select class="form-select" id="bs-validation-country" required>
                  <option value="">Select Country</option>
                  <option value="usa">USA</option>
                  <option value="uk">UK</option>
                  <option value="france">France</option>
                  <option value="australia">Australia</option>
                  <option value="spain">Spain</option>
                </select>
              </div> --}}

              <div class="mb-3">
                <label class="form-label" for="avatar">Profile Image <span class="text-muted">(optional)</span></label>
                <input type="file" class="form-control" name="avatar" id="avatar"/>
                @error('avatar')
                  <p class="text-danger">{{$errors->first("avatar")}}</p>
                @enderror
              </div>
              
              <div class="mb-3">
                <label class="form-label" for="bio">Bio <span class="text-muted">(optional)</span></label>
                <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
              </div>

              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms-conditions" required name="terms">
                  <label class="form-check-label" for="terms-conditions">
                    I agree to
                    <a href="javascript:void(0);">privacy policy & terms</a>
                  </label>
                </div>
              </div>
              <button class="btn btn-primary d-grid w-100">Sign up</button>
            </form>

            <p class="text-center">
              <span>Already have an account?</span>
              <a href="{{route('login')}}">
                <span>Sign in instead</span>
              </a>
            </p>

            <div class="divider my-4">
              <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center">
              <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                <i class="tf-icons fa-brands fa-google fs-5"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                <i class="tf-icons fa-brands fa-twitter fs-5"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>
@endsection


