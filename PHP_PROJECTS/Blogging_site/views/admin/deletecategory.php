<?php 
session_start();


if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){

        $category_id = $_GET['category_id'];

        $sql = "UPDATE category SET deleted_at = CURRENT_TIMESTAMP WHERE id = $category_id";
        
        $result = mysqli_query($conn , $sql);
        
        if($result)
            header('location: CategoryDetails.php');
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