<table class="table">

    <thead>
        <th>Id</th>
        <th>Owned By</th>
        <th>Category</th>
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Deleted_at</th>
    </thead>

    <tbody>
        @isset($posts)
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user->getFullName() }}</td>
                    <td>{{ $post->getCategoryName($post->category) }} </td>
                    <td><a href="{{route("posts.show" , $post)}}">{{ Str::limit($post->title , 20 ) }}</a></td>
                    <td>{{ Str::limit($post->content , 50 , "......") }}</td>
                    <td>{{ $post->image }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                    <td>@if($post->deleted_at) {{$post->deleted_at->diffForHumans()}} @endif</td>
                </tr>
            @endforeach
        @endisset
    </tbody>

</table>
