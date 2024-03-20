<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('../common/userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){

        $category_id = $_GET['category_id'];

        $sql = "UPDATE storycategory  
                SET image = ''  
                WHERE id = $category_id";

        $result = mysqli_query($conn , $sql);

        if($result){
            header("location: editCategorydetails.php?category_id=$category_id");
        }
        else{
            echo "ERROR " . mysqli_error($conn);
        }
    }
    else{
        session_unset();
        session_destroy();
        header('location: ../common/logout.php?LogoutSuccess=true');
    }
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php?LogoutSuccess=true');
}

?>