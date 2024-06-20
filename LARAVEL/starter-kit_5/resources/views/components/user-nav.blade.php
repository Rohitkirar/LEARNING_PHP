  <!-- Navbar pills -->
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-sm-row mb-4">
        
        <li class="nav-item"><a class="nav-link @if(basename(request()->url()) != "edit") active @endif" href="{{route('users.show' , $user->id)}}"><i class='ti-xs ti ti-user-check me-1'></i> Profile</a></li>
        <li class="nav-item"><a class="nav-link @if(basename(request()->url()) == "edit") active @endif" href="{{route('users.edit' , $user->id)}}"><i class='ti-xs ti ti-edit me-1'></i> Edit</a></li>
        {{-- <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-projects')}}"><i class='ti-xs ti ti-layout-grid me-1'></i> Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-connections')}}"><i class='ti-xs ti ti-link me-1'></i> Connections</a></li> --}}
      </ul>
    </div>
  </div>
  <!--/ Navbar pills -->