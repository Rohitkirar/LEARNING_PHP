<table class="table">

    <thead>
        <th>Id</th>
        <th>Username</th>
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Created_at</th>
    </thead>

    <tbody>
        @isset($posts)
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->username }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->image }}</td>
                    <td>{{ $post->created_at }}</td>
                </tr>
            @endforeach
        @endisset
    </tbody>

</table>
