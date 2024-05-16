@section('styles')
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection
{{-- <button class="btn btn-secondary" onclick="backbtn()">Back</button> --}}

<table class="table" id="post-table" style="width:100% ; ">

    <thead>
        <th>#</th>
        <th>Username</th>
        <th>caption</th>
        <th>Image</th>
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
            $("#post-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.posts.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'user.username',
                        name: 'user.username',
                    },
                    {
                        data: 'caption',
                        name: 'caption'
                    },

                    {
                        data: 'images.url',
                        name: 'images.url',
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
                        name: 'id' , searchable: false , orderable: false
                    },
                    {
                        data: 'deleted_at',
                        name: 'updated_at' , searchable: false , orderable: false
                    },
                ]
            });
        });

        function backbtn() {
            window.history.back();
        }
    </script>
@endsection
