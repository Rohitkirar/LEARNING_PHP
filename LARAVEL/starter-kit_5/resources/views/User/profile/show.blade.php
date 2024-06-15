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
    <span class="text-muted fw-light">User Profile /</span> Profile
  </h4>

  
  <!-- Navbar pills -->
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-sm-row mb-4">
        <li class="nav-item"><a class="nav-link active" href="{{route('user.profile.show')}}"><i class='ti-xs ti ti-user-check me-1'></i> Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.profile.edit')}}"><i class='ti-xs ti ti-users me-1'></i> Edit</a></li>
        {{-- <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-projects')}}"><i class='ti-xs ti ti-layout-grid me-1'></i> Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-connections')}}"><i class='ti-xs ti ti-link me-1'></i> Connections</a></li> --}}
      </ul>
    </div>
  </div>
  <!--/ Navbar pills -->

  <!-- Header -->
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="user-profile-header-banner">
          <img src="{{ asset('assets/img/pages/header.png') }}" alt="Banner image" class="rounded-top " style="height:150px">
        </div>
        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
          <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
            <img src="{{ $user->avatar ? $user->avatar : asset('assets/img/avatars/14.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
          </div>
          <div class="flex-grow-1 mt-3 mt-sm-5">
            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
              <div class="user-profile-info">
                <h4>{{$user->fullName()}}</h4>
                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                  <li class="list-inline-item">
                    <i class='ti ti-color-swatch'></i> {{$user->bio}}
                  </li>                  
                  {{-- <li class="list-inline-item">
                    <i class='ti ti-color-swatch'></i> UX Designer
                  </li>
                  <li class="list-inline-item">
                    <i class='ti ti-map-pin'></i> Vatican City
                  </li>
                  <li class="list-inline-item">
                    <i class='ti ti-calendar'></i> Joined April 2021
                  </li> --}}
                </ul>
              </div>
                <a href="javascript:void(0)" class="btn btn-primary">
                  <i class='ti ti-user-check me-1'></i>Connected
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Header -->

  <!-- User Profile Content -->
  <div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
      <!-- About User -->
      <div class="card mb-4">
        <div class="card-body">
          <small class="card-text text-uppercase">About</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">First Name:</span> <span>{{$user->first_name}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">Last Name:</span> <span>{{$user->last_name}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span class="fw-bold mx-2">gender:</span> <span>{{$user->gender}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span class="fw-bold mx-2">Date Of Birth:</span> <span>{{$user->birth_date}}</span></li>
          </ul>
          <small class="card-text text-uppercase">Contacts</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span> <span>{{$user->phone_number}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-skype"></i><span class="fw-bold mx-2">Username:</span> <span>{{$user->username}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span> <span>{{$user->email}}</span></li>
          </ul>
          {{-- <small class="card-text text-uppercase">Teams</small>
          <ul class="list-unstyled mb-0 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-angular text-danger me-2"></i>
              <div class="d-flex flex-wrap"><span class="fw-bold me-2">Backend Developer</span><span>(126 Members)</span></div>
            </li>
            <li class="d-flex align-items-center"><i class="ti ti-brand-react-native text-info me-2"></i>
              <div class="d-flex flex-wrap"><span class="fw-bold me-2">React Developer</span><span>(98 Members)</span></div>
            </li>
          </ul> --}}
        </div>
      </div>
      <!--/ About User -->
    </div>
  </div>
  <!--/ User Profile Content -->
@endsection
