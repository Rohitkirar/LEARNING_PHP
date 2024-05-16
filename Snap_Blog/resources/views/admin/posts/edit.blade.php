@extends('layouts.admin')

@section('title')
    create post
@endsection

@section('content')
    <div class="container w-50 p-4 border mt-5 bg-white">

        <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PATCH')

            <h5 class="border-bottom pb-3">Edit Post</h5>

            <input type="hidden" name="user_id" value="{{$post->user_id}}" />

            <div class="form-group mt-3">
                <label for="image" class="form-label">Add File</label>
                @error('file')
                    <span class="text-danger" style="float:right">{{ $errors->first('file') }}</span>
                @enderror
                <input type="file" multiple name="file[]" id="image" value="{{ old('file') }}"
                    class="form-control @error('file') is-invalid @enderror">
            </div>

            <div class="form-group mt-3">
                <label for="caption" class="form-label">Add caption</label>
                @error('caption')
                    <span class="text-danger" style="float:right">{{ $errors->first('caption') }}</span>
                @enderror
                <textarea name="caption" rows="4" id="caption" class="form-control  @error('caption') is-invalid @enderror">{{ old('caption', $post->caption) }}</textarea>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary w-100">Edit Post</button>
            </div>

        </form>
    </div>
@endsection
