<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../Class/Connection.php');
    require_once('../Class/StoryComment.php');

    $comment = new StoryComment();
    
    if($comment->deleteComment($_GET['comment_id']) ){
        $_SESSION['deletecomment'] = true;
        if(isset($_GET['story_id'])){
            header("location: User/storyView.php?story_id={$_GET['story_id']}");
        }
        else{
            header("location: User/allstoryView.php");
        }
    }
    else{
        header("location: User/allstoryView.php");
    }    
}
else{
    session_unset();
    session_destroy();
    header('location: logout.php?Success=false');
}

?>