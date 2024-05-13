<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <title>posts</title>

</head>

<body>
    <div class="d-flex m-3">
        <button class="btn btn-secondary " onclick="backbtn()">Back</button>
    </div>
    <div class="container">
        <table class="table" id="post-table">
            
            <h4 class="bg-grey p-4 border">Post Data</h4>

            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>content</th>
                <th>view Comments</th>
            </thead>
        </table>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#post-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('posts.user' , $user_id ) }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'content',
                        name: 'content'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });

        function backbtn() { window.history.back(); }


    </script>


</body>

</html>