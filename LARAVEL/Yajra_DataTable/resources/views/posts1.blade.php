<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
<div class="m-5">
    <table class="table w-100" id="post-table">
        <thead>
            <th>Id</th>
            <th>Posted By</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>View</th>
            <th>Action</th>
        </thead>
    </table>
</div>
    
<button id="backButton">Back</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

{{-- {{ $dataTable->scripts() }} --}}

<script>

    $(document).ready(function(){
        $("#post-table").DataTable({
            "pagelength" : 10 ,
            processing : true,
            serverSide : true,
            order :[] ,
            ajax : '{{ route("post1")}}' ,
            columns : [
                { data : 'id' , name : 'id' },
                { data : 'name' , name : 'name' , orderable:false , searchable:false },
                { data : 'title' , name : 'title' },
                { data : 'content' , name : 'content' },
                { data : 'created_at' , name : 'created_at' },
                { data : 'updated_at' , name : 'updated_at' },
                { data : 'view' , name : 'view' , orderable:false , searchable:false},
                { data : 'deleted_at' , name : 'deleted_at' },
            ],
            // "columnDefs": [{
            //     "targets": [0], // Target the second column (index 1)
            //     "orderable": false // Disable sorting for this column
            // }]
        });
    });

    document.getElementById("backButton").addEventListener("click", function() {
        window.history.back();
    });

</script>

</body>

</html>