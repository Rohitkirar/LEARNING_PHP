<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf @method('PATCH')

    <fieldset @disabled($post->deleted_at)>

        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <span class="text-danger">*</span>
            @error('category_id')
                <span class="text-danger float-right">{{ $errors->first('category_id') }}</span>
            @enderror
            <select name="category_id" id="category" class="form-control">
                <option value="">select</option>
                @isset($categories)
                    @foreach ($categories as $id => $value)
                        <option value="{{ $id }}" @if ($post->category_id == $id) selected @endif>
                            {{ $value }}</option>
                    @endforeach
                @endisset
            </select>
        </div>

        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <span class="text-danger">*</span>
            @error('title')
                <span class="text-danger float-right">{{ $errors->first('title') }}</span>
            @enderror
            <input type="text" name="title" value="{{ $post->title }}" id="title" class="form-control"
                autofocus />
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <span class="text-danger">*</span>
            @error('content')
                <span class="text-danger float-right">{{ $errors->first('content') }}</span>
            @enderror
            <textarea name="content" id="content" class="form-control" rows="6">{{ $post->content }}</textarea>
        </div>


        <div class="form-group">
            @if ($post->images)
                <div style="display:grid; grid-template-columns:50% 50%;">
                    @foreach ($post->images as $image)
                        <div>
                            <img class="p-3 card" style="object-fit: contain ; width:90%" src="{{ asset($image->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            @endif
{{-- 
            <label for="image" class="form-label">Image</label>
            @error('image')
                <span class="text-danger float-right ">{{ $errors->first('image') }}</span>
            @enderror
            <input type="file" name="image" id="image" /> --}}
        </div>


        <div>
            @if (is_null($post->deleted_at))
                <button type="submit" name="submit" class="btn btn-primary form-control">Update</button>
            @endif
        </div>
    </fieldset>

</form>
@if (is_null($post->deleted_at))
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf @method('DELETE')
        <button type="submit" name="submit" class="btn btn-danger form-control">Delete</button>
    </form>
@else
    <form action="{{ route('posts.restore', $post->id) }}" method="POST">
        @csrf @method('PUT')
        <button type="submit" name="submit" class="btn btn-success form-control">Restore Post</button>
    </form>
@endif
