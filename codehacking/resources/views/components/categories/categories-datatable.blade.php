<table class="table">

    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Deleted_at</th>
    </thead>

    <tbody>
        @isset($categories)
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route("categories.edit" , $category->id) }}">{{ $category->name}}</a></td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td>{{ $category->updated_at->diffForHumans() }}</td>
                    <td>{{ $category->deleted_at ? $category->deleted_at->diffForHumans() : null }}</td>
                </tr>
            @endforeach
        @endisset
    </tbody>

</table>