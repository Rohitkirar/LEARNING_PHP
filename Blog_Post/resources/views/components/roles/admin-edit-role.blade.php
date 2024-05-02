<h4>Update Role</h4>

<hr>

<form action="{{route('roles.update' , $role->id)}}" method="POST">
@csrf @method('PATCH')

<div class="form-group">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" value="{{old('name' ,$role->name)}}" class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <p class="invalid-feedback">{{$errors->first('name')}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" name="slug" id="slug" value="{{old( 'slug' , $role->slug)}}" class="form-control @error('slug') is-invalid @enderror">
    @error('slug')
        <p class="invalid-feedback">{{$errors->first('slug')}}</p>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">Create</button>
</div>

</form>