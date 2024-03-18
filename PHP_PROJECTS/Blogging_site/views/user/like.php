<?php 
session_start();

// like data storing functionalites

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    $story_id = $_GET['story_id'];

    $sql = "SELECT id , deleted_at  FROM storylikes WHERE user_id={$_SESSION['user_id']} AND story_id=$story_id ";

    $result = mysqli_query($conn , $sql);

    $resultArray = mysqli_fetch_assoc($result);
    
    if($resultArray){
        
        if($resultArray['deleted_at']){
            $sql = "UPDATE storylikes SET deleted_at = DEFAULT WHERE id = '{$resultArray['id']}'";
            $result = mysqli_query($conn , $sql);
            
            if($result)
                header("location: storyView.php?story_id=$story_id");
            else
                echo "ERROR : " . mysqli_error($conn);
        }
        else{
            $sql = "UPDATE storylikes SET deleted_at = CURRENT_TIMESTAMP WHERE id = '{$resultArray['id']}'";
            $result = mysqli_query($conn , $sql);
            
            if($result)
                header("location: storyView.php?story_id=$story_id");
            else
                echo "ERROR : " . mysqli_error($conn);
        }

    }
    else{
        $sql = "INSERT INTO storylikes (user_id , story_id ) VALUES( {$_SESSION['user_id']} , '$story_id')";

        $result = mysqli_query($conn , $sql);

        if($result)
            header("location: storyView.php?story_id=$story_id");
        else
            echo "ERROR " . mysqli_error($conn);
    }
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php');
}


/*
// like data storing functionalites using form
    if(isset($_POST['like_btn'])){

        $story_id = $_POST['like_btn'];

        $sql = "SELECT id , deleted_at  FROM likes WHERE user_id='{$_SESSION['user_id']}' AND story_id = $story_id ";
        $result = mysqli_query($conn , $sql);
        
        $resultArray = mysqli_fetch_assoc($result);

        if($resultArray){
            if($resultArray['deleted_at']){
                $sql = "UPDATE likes SET deleted_at = DEFAULT WHERE id = '{$resultArray['id']}'";
                $result = mysqli_query($conn , $sql);
                
                if($result)
                    echo "successfull liked";
                else
                    echo "ERROR : " . mysqli_error($conn);
            }
            else{
                $sql = "UPDATE likes SET deleted_at = CURRENT_TIMESTAMP WHERE id = '{$resultArray['id']}'";
                $result = mysqli_query($conn , $sql);
                
                if($result)
                echo "successfull unliked";
                else
                    echo "ERROR : " . mysqli_error($conn);
            }
        }
        else{
            $sql = "INSERT INTO likes (user_id , story_id ) VALUES('{$_SESSION['user_id']}' , '$story_id')";

            $result = mysqli_query($conn , $sql);

            if($result)
                echo "successfull liked";
            else
                echo "ERROR " . mysqli_error($conn);
        }
        
        
    }
    */
?>