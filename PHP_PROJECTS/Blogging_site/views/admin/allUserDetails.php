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
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <style>
        table{
            padding :1rem;
        }
        td , th{
            padding:10px;
            text-align: left;
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
    
    <main>

        <div>
            <span><strong style="font-size:x-large;">ALL USERS</strong></span>
        </div>
        <div >
            <table>
                <tr>
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
                            }
                        echo "</tr>";
                    }
                ?>    
            </table>
        </div>

    </main>
</body>
</html>

<!-- <?php print_r($_SESSION) ?> -->
