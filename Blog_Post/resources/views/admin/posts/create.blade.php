@extends('layouts.admin')

@section('content')
    <div class="container w-50 card p-5">

        <h4>Create Post</h4>
        <hr>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                @error('image')
                    <span class="text-danger float-right ">{{ $errors->first('image') }}</span>
                @enderror
                <input type="file" name="image" id="image" />
            </div>

            <div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
            </div>

        </form>
    </div>
@endsection
