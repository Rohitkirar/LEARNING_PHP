<div style="display:flex ; justify-content:flex-end">
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary m-2">Edit</a>
    @if(Auth::id() != $user->id)
    @if (is_null($user->deleted_at) )
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit" name="submit" class="btn btn-danger m-2">Delete</button>
        </form>
    @else
        <form action="{{ route('users.restore', $user->id) }}" method="POST">
            @csrf @method('PUT')
            <button type="submit" name="submit" class="btn btn-success m-2">Restore</button>
        </form>
    @endif
    @endif
</div>
<div class="p-3">
    <div class="mt-3">
        <p class="form-label"> Name</p>
        <p class="form-control">{{$user->getfullName()}}</p>
    </div>
    <div class="mt-3">
        <p class="form-label"> Date Of Birth </p>
        <p class="form-control">{{$user->date_of_birth}}</p>
    </div>
    <div class="mt-3">
        <p class="form-label">Email</p>
        <p class="form-control">{{$user->email}}</p>
    </div>
    <div class="mt-3">
        <p class="form-label">Phone Number</p>
        <p class="form-control">{{$user->phone_number}}</p>
    </div>
    <div class="mt-3">
        <p class="form-label">Username</p>
        <p class="form-control">{{$user->username}}</p>
    </div>
</div>