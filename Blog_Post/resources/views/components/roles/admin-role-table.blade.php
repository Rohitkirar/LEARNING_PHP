<table class="table border">
    <h4>Roles</h4>
    
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td><a href="{{route('roles.edit' , $role->id)}}"> {{$role->name}} </a></td>
                <td>{{$role->slug}}</td>
                <td>
                    <form action="{{route("roles.destroy" , $role->id)}}" method="POST">
                        @csrf  @method("DELETE")
                        
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
