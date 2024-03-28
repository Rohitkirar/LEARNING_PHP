<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../Class/Connection.php');
    require_once('../Class/User.php');
    require_once('../Class/StoryComment.php');
    
    $user = new User();
    $comment = new StoryComment();        
    
    $userData = $user->userDetails($_SESSION['user_id']);
    $role = $userData[0]['role'];
    
    if($comment->deleteComment($_GET['comment_id']) ){
        $_SESSION['deletecomment'] = true;

        if($role == 'admin'){
            if(isset($_GET['story_id'])){
                header("location: admin/adminstoryview.php?story_id={$_GET['story_id']}");
            }
            else{
                header("location: admin/adminallstoryview.php");
            }
        }
        else{
            if(isset($_GET['story_id'])){
                header("location: User/storyview.php?story_id={$_GET['story_id']}");
            }
            else{
                header("location: User/allstoryview.php");
            }
        }
    }
    else{
        if($role=='admin')
            header("location: admin/adminallstoryView.php");
        else
            header("location: User/allstoryView.php");
    }    
}
else{
    session_unset();
    session_destroy();
    header('location: logout.php?Success=false');
}

?>