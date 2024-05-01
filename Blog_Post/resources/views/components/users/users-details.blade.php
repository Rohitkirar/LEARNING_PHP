<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <p class="h3 mb-2 text-gray-800">users</p>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Phone Number</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>deleted_at</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Phone Number</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>deleted_at</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{route('users.show' , $user->id)}}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                <td>
                                    {{-- @can('delete', $user) --}}
                                        @if ($user->deleted_at)
                                            {{ $user->deleted_at->diffForHumans() }}
                                        @else
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
