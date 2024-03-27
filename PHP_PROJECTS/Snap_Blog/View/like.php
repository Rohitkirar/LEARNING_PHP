<?php 
session_start();

// like data storing functionalites

if(isset($_SESSION['user_id'])){

    require_once('../Class/Connection.php');
    require_once('../Class/StoryLike.php');
    
    $like = new StoryLike();
    
    if($like->addLike($_SESSION['user_id'] , $_GET['story_id'] )){
        if(isset($_GET['storyview'])){
            header("location: User/storyview.php?story_id={$_GET['story_id']}");
        }
        else{
            header('location: User/allstoryview.php');
        }
    }
}
else{
    session_unset();
    session_destroy();
    header('location: logout.php?Success=false');
}

?>