  <!-- Navbar pills -->
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-sm-row mb-4">
        <li class="nav-item"><a class="nav-link @if(is_numeric(basename(request()->url()))) active @endif" href="{{route('categories.show' , $category->id)}}"><i class='ti-xs ti ti-category me-1'></i> Category</a></li>
        <li class="nav-item"><a class="nav-link @if(basename(request()->url()) == "edit" ) active @endif" href="{{route('categories.edit' , $category->id)}}"><i class='ti-xs ti ti-edit me-1'></i> Edit</a></li>
        {{-- <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-projects')}}"><i class='ti-xs ti ti-layout-grid me-1'></i> Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('pages/profile-connections')}}"><i class='ti-xs ti ti-link me-1'></i> Connections</a></li> --}}
      </ul>
    </div>
  </div>
  <!--/ Navbar pills -->