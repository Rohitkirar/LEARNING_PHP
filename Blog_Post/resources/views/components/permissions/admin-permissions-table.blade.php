<div class="col-sm-7 m-2 p-4 bg-white shadow-lg">

    <h4>Permissions</h4>

    <hr>

    <table class="table border">

        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Delete</th>
        </thead>

        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td><a href="{{route('permissions.edit' , $permission->id)}}">{{ $permission->name }}</a></td>
                    <td>{{ $permission->slug }}</td>
                    <td>
                        <form action="{{ route('permissions.destroy', "$permission->id") }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
