<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');

    $comment_id = $_GET['comment_id'];

    $sql = "UPDATE comments SET deleted_at = CURRENT_TIMESTAMP WHERE id = $comment_id";
    
    $result = mysqli_query($conn , $sql);
    
    if($result)
        header("location: storyView.php?story_id={$_GET['story_id']}");
    
    else
        echo "ERROR " . mysqli_error($conn);

}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php');
}


/*
    // comment delete using form
    if(isset($_POST['deletecomment'])){
        $sql = "UPDATE comments SET deleted_at = CURRENT_TIMESTAMP WHERE id = {$_POST['deletecomment']}";
        $result = mysqli_query($conn , $sql);
        if($result)
            header('location: storyView.php');
        else
            echo "ERROR " . mysqli_error($conn);     
    }
*/
?>