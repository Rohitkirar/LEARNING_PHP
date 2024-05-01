@isset($roles)
    <div class="w-50 container bg-white mt-5">

        <h3 class="text-center pt-4">Roles</h3>
        <hr>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Attach</th>
                <th>Detach</th>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        <td class="text-center">
                            <span
                                class="btn p-2 rounded-circle @if ($user->roles->contains($role)) btn-success @else btn-danger @endif"></span>
                        </td>
                        <td>
                            @if(!$user->roles->contains($role))
                                <form action="{{ route('users.attachRole', $user->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                    <button type="submit" class="btn btn-primary">Attach</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if ($user->roles->contains($role))
                                <form action="{{ route('users.detachRole', $user->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                    <button type="submit" class="btn btn-danger">Detach</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endisset
