<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <title>Document</title>
    
</head>

<body>
    <div>
        <button class="btn btn-secondary m-3" onclick="backbtn()">Back</button>
    </div>
    <div class="container">
        <table class="table" id="user-table">

            <h4 class="bg-grey p-4 border">Users Data</h4>
            <thead>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>UserName</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>View Post</th>
            </thead>
        </table>
    </div>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function(){
            $("#user-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route("users.index")}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'username', name: 'username'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action' , name:'action'},
                ]
            });
        });

        function backbtn() { window.history.back(); }

    </script>
</body>

</html>
