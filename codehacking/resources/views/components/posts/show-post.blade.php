<div style="display:flex ; justify-content:flex-end">
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary m-2">Edit</a>
    @if (is_null($post->deleted_at))
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit" name="submit" class="btn btn-danger m-2">Delete</button>
        </form>
    @else
        <form action="{{ route('posts.restore', $post->id) }}" method="POST">
            @csrf @method('PUT')
            <button type="submit" name="submit" class="btn btn-success m-2">Restore</button>
        </form>
    @endif
</div>
<div class="p-3">
    <div>
        <p class="h4"> Category : {{ $post->getCategoryName($post->category) }}</p>
    </div>

    <div>
        <p class="h5">Title : {{ $post->title }}</p>
    </div>

    <div style="text-align:justify">
        <p>{{ $post->content }}</p>
    </div>


    <div class="form-group">
        @if ($post->images)
            <div>
                @foreach ($post->images as $image)
                    <div>
                        <img class="p-3" style="object-fit: contain ; width:100%" src="{{ asset($image->image) }}"
                            alt="">
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
