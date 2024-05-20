@section('styles')
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection
{{-- <button class="btn btn-secondary" onclick="backbtn()">Back</button> --}}


<table class="table" id="comment-table" style="width:100% ; ">

    <thead>
        <th>#</th>
        <th>Comment</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>Action</th>
    </thead>

</table>


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#comment-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('admin.comments.index')}}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'body',
                        name: 'body',
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
