<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){
        // comment delete

        $sql = "UPDATE comments SET deleted_at = CURRENT_TIMESTAMP WHERE id = {$_GET['deletecommentid']}";
        $result = mysqli_query($conn , $sql);

        if($result)
            header("location: adminstoryView.php?story_id={$_GET['story_id']}");
        else
            echo "ERROR " . mysqli_error($conn);     
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



    
    // delete comment using form logic
       
    // if(isset($_POST['deletecomment'])){
    //     $sql = "UPDATE comments SET deleted_at = CURRENT_TIMESTAMP WHERE id = {$_POST['deletecomment']}";
    //     $result = mysqli_query($conn , $sql);
    //     if($result)
    //         header('location: adminstoryView.php');
    //     else
    //         echo "ERROR " . mysqli_error($conn);     
    // }

?>