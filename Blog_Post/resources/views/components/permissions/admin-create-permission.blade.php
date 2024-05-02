<div class="col-sm-4 m-2 shadow-lg bg-white p-4">

    <h4>Create Permission</h4>

    <hr>

    <form action="{{route('permissions.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')<span class="invalid-feedback">{{$errors->first('name')}}</span>@enderror
        </div>

        <div class="form-group">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" value="{{old('slug')}}" class="form-control @error('slug') is-invalid @enderror">
            @error('name')<span class="invalid-feedback">{{$errors->first('slug')}}</span>@enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </div>

    </form>

</div>