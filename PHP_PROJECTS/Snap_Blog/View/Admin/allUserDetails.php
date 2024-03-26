<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../class/connection.php');
    require_once('../../class/User.php');
    $user = new User();
    
    
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php?LogoutSuccess=true');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../public/css/admin1.css">
    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>

    <script defer src="../../public/js/datatable.js"></script>



</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <main class="bg-white" style="margin-top:0.2rem; ">
        <div class="p-3">
            <strong> All User's Details</strong>
            <span style="float:right">
                <a class="btn btn-success" href="adduserform.php">Add User</a>
            </span>
        </div>
        <div class="m-4" style="margin: 0 auto;">
            <table id="usertable" class="table table-hover table-striped" style="width:100%">
                <thead >
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>gender</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>username</th>

                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    
                    $userDataArray = $user->userDetails();

                    foreach($userDataArray as $key => $values){
                        echo "<tr> 
                            <td>{$values['first_name']}</td>
                            <td>{$values['last_name']}</td>
                            <td>{$values['age']}</td>
                            <td>{$values['gender']}</td>
                            <td>{$values['email']}</td>
                            <td>{$values['mobile']}</td>
                            <td>{$values['username']}</td>

                            <td><a href='Edituserdetails.php?user_id={$values['id']}' class='updateuserbtn btn btn-primary'>Update</a></td>";
                            
                            
                        echo "</tr>";
                    }
                ?>    
                </tbody>
            </table>
        </div>

    </main>
    
    <?php
        require_once('../common/footer.php');
    
        if(isset($_SESSION['addusersuccess']) && $_SESSION['addusersuccess']==true){
            unset($_SESSION['addusersuccess']);
            echo '<script> alert("User added Successfully!") </script>';
        }
    ?>

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
