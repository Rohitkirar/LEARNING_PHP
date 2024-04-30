<x-admin-master>

    @section('content')

    @if(session('user_update_success'))

        <div class="alert alert-success">{{ session('user_update_success') }}</div>

    @endif
        
        <x-show-user-details :$user />

    @endsection

</x-admin-master>