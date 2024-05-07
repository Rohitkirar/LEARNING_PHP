<table class="table">
    <thead>
        <th>Name</th>
        <th>Created_at</th>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    </tbody>

</table>
