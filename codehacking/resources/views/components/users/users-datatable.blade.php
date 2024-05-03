<table class="table">

    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Status</th>
    </thead>

    <tbody>
        @isset($users)
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="{{route('users.edit' , $user->id)}}"> 
                            {{ $user->first_name ." " . $user->last_name }}
                        </a>
                    </td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->date_of_birth}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->is_active ? "Active" : "InActive" }}</td>
                </tr>
            @endforeach
        @endisset
    </tbody>

</table>
