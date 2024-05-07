<form action="{{ route('categories.store') }}" method="POST" >
    @csrf

    <div class="form-group">
        <label for="name" class="form-label">name</label>
        <span class="text-danger">*</span>
        @error('name')
            <span class="text-danger float-right">{{ $errors->first('name') }}</span>
        @enderror
        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control"
            autofocus />
    </div>

    <div>
        <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
    </div>

</form>