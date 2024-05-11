<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css' , 'resources/js/app.js'])

    <title>Document</title>
</head>

<body>
    <div>
        <table>
            <thead>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>UserName</th>
            </thead>
        </table>
    </div>

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
            });
        });
    </script>
</body>

</html>
