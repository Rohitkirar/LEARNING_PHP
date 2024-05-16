@section('styles')
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection

<table class="table" id="user-table" style="width:100% ; ">

    <thead>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birth Date</th>
        <th>Gender</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Username</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>Edit</th>
        <th>Action</th>
    </thead>

</table>


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#user-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.users.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'birth_date'
                    },
                    {
                        data: 'gender'
                    },
                    {
                        data: 'phone_number'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'id',
                        name: 'id' , searchable:false , orderable:false
                    },
                    {
                        data: 'deleted_at',
                        name: 'deleted_at', searchable:false , orderable:false
                    }
                ]
            });
        });

        function backbtn() {
            window.history.back();
        }
    </script>
@endsection
