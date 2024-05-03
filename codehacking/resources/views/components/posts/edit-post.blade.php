<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PATCH')

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
        <div>
            <img height="10%" width="100%" src="{{ asset($post->image) }}" alt="">
        </div>
        <label for="image" class="form-label">Image</label>
        @error('image')
            <span class="text-danger float-right ">{{ $errors->first('image') }}</span>
        @enderror
        <input type="file" name="image" id="image" />
    </div>

    <div>
        <button type="submit" name="submit" class="btn btn-primary form-control">Update</button>
    </div>

</form>
