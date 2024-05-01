<table class="table border">
    <h4>Role Permissions</h4>
    
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Attach</th>
        <th>Detach</th>
    </thead>
    <tbody>
        @foreach ($role->permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->slug}}</td>
                <td>
                    @if(!$role->permissions->contains($permission))
                    <form action="{{route('roles.attachPermission' , $role->id)}}" method="POST">
                        @csrf @method("PUT")
                        <input type="hidden" name="permission" value="{{$permission->id}}">
                        <button class="btn btn-primary" type="submit">Attach</button>
                    </form>
                    @endif
                </td>
                <td>
                    @if($role->permissions->contains($permission))
                        <form action="{{route('roles.detachPermission' , $role->id)}}" method="POST">
                            @csrf @method("PUT")
                            <input type="hidden" name="permission" value="{{$permission->id}}">
                            <button class="btn btn-danger" type="submit">Detach</button>
                        </form>
                    @endif
                </td>
                <td>

                </td>
            </tr>
        @endforeach
    </tbody>

</table>
