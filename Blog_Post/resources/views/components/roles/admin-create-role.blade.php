<h4>Create Role</h4>

<hr>

<form action="{{route('roles.store')}}" method="POST">
@csrf

<div class="form-group">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <p class="invalid-feedback">{{$errors->first('name')}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror">
    @error('slug')
        <p class="invalid-feedback">{{$errors->first('slug')}}</p>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">Create</button>
</div>

</form>