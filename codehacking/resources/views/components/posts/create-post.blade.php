<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="category" class="form-label">Category</label>
        <span class="text-danger">*</span>
        @error('category_id') <span class="text-danger float-right">{{ $errors->first('category_id') }}</span> @enderror
        <select name="category_id"  id="category" class="form-control" >
            <option value="">select</option>
            @isset($categories)
                @foreach($categories as $id => $value)
                    <option value="{{$id}}" @if(old("id") == $id) selected @endif >{{$value}}</option>
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
        <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control"
            autofocus />
    </div>

    <div class="form-group">
        <label for="content" class="form-label">Content</label>
        <span class="text-danger">*</span>
        @error('content')
            <span class="text-danger float-right">{{ $errors->first('content') }}</span>
        @enderror
        <textarea name="content" id="content" class="form-control" rows="6">{{ old('content') }}</textarea>
    </div>

    <div class="form-group">
        <label for="image" class="form-label">Image</label>
        <span>(optional)</span>
        @error('file')
            <span class="text-danger float-right ">{{ $errors->first('file') }}</span>
        @enderror
        <input type="file" name="file[]" id="image" multiple />
    </div>

    <div>
        <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
    </div>

</form>