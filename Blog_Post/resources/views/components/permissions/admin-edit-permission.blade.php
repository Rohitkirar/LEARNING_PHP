<div class="col-sm-4 m-2 shadow-lg bg-white p-4">

    <h4>Edit Permission</h4>

    <hr>

    <form action="{{route('permissions.update' , $permission->id)}}" method="POST">
        @csrf @method("PATCH")

        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name' , $permission->name )}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')<span class="invalid-feedback">{{$errors->first('name')}}</span>@enderror
        </div>

        <div class="form-group">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" value="{{old('slug' , $permission->slug)}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')<span class="invalid-feedback">{{$errors->first('name')}}</span>@enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>

    </form>

</div>