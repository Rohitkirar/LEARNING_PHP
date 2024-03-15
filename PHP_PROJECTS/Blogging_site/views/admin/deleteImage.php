<?php 
    session_start();

    if(isset($_SESSION['user_id']) && $_SESSION['role'] == 'admin'){

        require_once('../../database/connection.php');

        $image_id = $_GET['image_id'];
        $story_id = $_GET['story_id'];

        $sql = "UPDATE images  
                SET deleted_at = CURRENT_TIMESTAMP  
                WHERE id = $image_id";

        $result = mysqli_query($conn , $sql);

        if($result){
            header("location: updateStoryForm.php?story_id=$story_id");
        }
        else{
            echo "ERROR " . mysqli_error($conn);
        }
    }
    else{
        session_unset();
        session_destroy();
        header('location: ../common/logout.php');
    }

?>