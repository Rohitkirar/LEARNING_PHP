<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf @method('PATCH')
<fieldset @disabled($category->deleted_at)  >
    <div class="form-group">
        <label for="name" class="form-label">name</label>
        <span class="text-danger">*</span>
        @error('name')
            <span class="text-danger float-right">{{ $errors->first('name') }}</span>
        @enderror
        <input type="text" name="name" value="{{ old('name', $category->name) }}" id="name"
            class="form-control" autofocus />
    </div>

    <div>
        @if(is_null($category->deleted_at))<button type="submit" name="submit" class="btn btn-primary form-control">Update</button>@endif
    </div>
</fieldset>
</form>

<div style="margin-top:1rem">
    @if (is_null($category->deleted_at))
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf @method('DELETE')

            <button type="submit" class="btn btn-danger form-control">Delete</button>
        </form>
    @else
        <form action="{{ route('categories.restore', $category->id) }}" method="POST">
            @csrf @method('PUT')
            <button type="submit" class="btn btn-success form-control">Restore</button>
        </form>
    @endif
</div>
