<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('../common/userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] != 'admin'){
        session_unset();
        session_destroy();
        header('location: ../common/logout.php');
    }
    
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap4.js"></script>
    <link rel="stylesheet" href="../../public/css/admin1.css">
    <link rel="stylesheet" href="../../public/css/style.css">

    <script defer src="../../public/js/datatable.js"></script>

    <style>

        td , th{
            padding:10px;
            text-align: left;
        }
        thead{
            background-color: black;
            color:white;
        }
        .updateuserbtn a{
            text-decoration: none;
            color:white;
        }
        .deleteuserbtn a {
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <main class="bg-white" style="margin:0; margin-top:1rem; ">
        <strong> All User's Details</strong><span style="float:right"><a class="btn btn-success" href="adduserform.php">Add User</a></span>
        <div class="m-4" style="margin: 0 auto;">
            <table id="usertable" class="table table-hover">
                <thead class="thead-dark">
                    <tr >
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>gender</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>username</th>
                        <th>status</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * , IF(deleted_at , 'InActive' , 'Active') as user_status FROM users WHERE role = 'user'";
                    $result = mysqli_query($conn , $sql);
                    $userDataArray = mysqli_fetch_all($result , MYSQLI_ASSOC);
                    
                    foreach($userDataArray as $key => $values){
                        echo "<tr> 
                            <td>{$values['first_name']}</td>
                            <td>{$values['last_name']}</td>
                            <td>{$values['age']}</td>
                            <td>{$values['gender']}</td>
                            <td>{$values['email']}</td>
                            <td>{$values['mobile']}</td>
                            <td>{$values['username']}</td>
                            <td>{$values['user_status']}</td>
                            <td><a href='Edituserdetails.php?user_id={$values['id']}' class='updateuserbtn btn btn-primary'>Update</a></td>";
                            
                            if($values['user_status'] == 'Active'){
                                echo "<td><a href='deleteUser.php?user_id={$values['id']}' onclick=\"return confirm('Do you want to delete {$values['first_name']}');\" class='deleteuserbtn btn btn-danger' >Delete</a></td>";   
                            }else{
                                echo "<td></td>";
                            }
                            
                        echo "</tr>";
                    }
                ?>    
                </tbody>
            </table>
        </div>

    </main>

    <script>

         
        // $(document).ready(function () { 
        //     $('#usertable').DataTable({ 
        //         searching: false // remove search option 
        //     }); 
        // }); 

        // $(document).ready(function () { 
        //     $('#usertable').DataTable({ 
        //         searching: true // remove search option 
        //     }); 
        // }); 
    </script>

</body>
</html>

<!-- <?php print_r($_SESSION) ?> -->
