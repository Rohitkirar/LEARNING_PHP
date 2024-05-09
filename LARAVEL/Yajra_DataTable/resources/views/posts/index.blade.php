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

<button id="backButton">Back</button>

<div class="m-5 " style="text-align: justify">

    

    <table class="table" id="post-table">

        <thead >
            <th>S No</th>
            <th>Id</th>
            <th>category</th>
            <th>title</th>
            <th>content</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
            <th>even</th>
        </thead>

    </table>

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    {{-- {{ $dataTable->scripts() }} --}}

    <script>

        $(document).ready(function(){
            $("#post-table").DataTable({
                "pagelength" : 10 ,
                processing : true,
                serverSide : true,
                ajax : '{{ route("posts.index")}}' ,
                columns : [
                    { data : "DT_RowIndex" , name : "DT_RowIndex" , orderable:false , searchable:false},
                    { data : 'id' , name : 'id' },
                    { data : 'category_id' , name : 'category_id' },
                    { data : 'title' , name : 'title' },
                    { data : 'content' , name : 'content' },
                    { data : 'created_at' , name : 'created_at' },
                    { data : 'updated_at' , name : 'updated_at' },
                    { data : 'deleted_at' , name : 'deleted_at' },
                    { data : 'even' , name : 'even' },
                ],
            });
        })

        document.getElementById("backButton").addEventListener("click", function() {
            window.history.back();
        });

    </script>

</body>

</html>