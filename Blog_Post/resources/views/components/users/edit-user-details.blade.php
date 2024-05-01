@isset($user)
    <div class="container w-50 bg-white p-5">

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="avatar" class="form-label">Profile</label>
                <br>
                <img class="rounded-circle" height=100px width=100px src="{{asset($user->avatar)}}" alt="">
                <input type="file" id="avatar" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                @error('avatar')
                    <span class="text-danger"> {{ $errors->first('avatar') }} </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name' , $user->name) }}">
                @error('name')
                    <span class="text-danger"> {{ $errors->first('name') }} </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email' , $user->email) }}">
                @error('email')
                    <span class="text-danger"> {{ $errors->first('email') }} </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="phone_number" id="phone_number" name="phone_number"
                    class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number' , $user->phone_number) }}">
                @error('phone_number')
                    <span class="text-danger"> {{ $errors->first('phone_number') }} </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
        </form>

    </div>
@endisset
