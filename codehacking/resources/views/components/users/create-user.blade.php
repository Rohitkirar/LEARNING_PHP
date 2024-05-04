<form action="{{ route('users.store') }}" method="POST" enctype=multipart/form-data>
    @csrf

    <div style="text-align:center">
        <img style="border-radius:100% ; max-height:10rem; " src="" id="profilePreview" >
    </div>

    <div class="form-group">
        <label for="profile" class="form-label">Profile Image</label>
        <input type="file" id="profile" name="file" class="form-control">
    </div>

    <div class="form-group">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
            class="form-control @error('first_name') is-invalid @enderror " />
        @error('first_name')
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
            class="form-control @error('last_name') is-invalid @enderror " />
        @error('last_name')
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" id="gender" value="{{ old('gender') }}" class="form-control @error('gender') is-invalid @enderror " >
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        @error("gender") <span class="text-danger">{{ $errors->first('gender') }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}"
            class="form-control @error('date_of_birth') is-invalid @enderror" />
        @error('date_of_birth')
            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
            class="form-control @error('phone_number') is-invalid @enderror" />
        @error('phone_number')
            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"
            class="form-control @error('email') is-invalid @enderror" />
        @error('email')
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}"
            class="form-control @error('username') is-invalid @enderror" />
        @error('username')
            <span class="text-danger">{{ $errors->first('username') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" value="{{ old('password') }}"
            class="form-control @error('password') is-invalid @enderror" />
        @error('password')
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
            value="{{ old('password_confirmation') }}"
            class="form-control @error('password_confirmation') is-invalid @enderror" />
        @error('password_confimation')
            <span class="text-danger">{{ $errors->first('password_confimation') }}</span>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Create User</button>
    </div>

</form>


<script>
    document.getElementById('profile').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
