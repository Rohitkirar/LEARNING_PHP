<?php 
session_start();
if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){

        $user_id = $_GET['user_id'];

        $sql = "UPDATE users SET deleted_at = CURRENT_TIMESTAMP WHERE id = $user_id";
        $result = mysqli_query($conn , $sql);
        if($result)
            header('location: allUserDetails.php');
        else
            echo 'ERROR ' . mysqli_error($conn);
    }
    else{
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