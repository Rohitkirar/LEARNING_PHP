<?php 
session_start();

// like data storing functionalites

if(isset($_SESSION['user_id'])){

    require_once('../Class/Connection.php');
    require_once('../Class/User.php');
    require_once('../Class/StoryLike.php');
    $user = new User();
    $like = new StoryLike();
    
    $userData = $user->userDetails($_SESSION['user_id']);
    $role = $userData[0]['role'];

    if($like->addLike($_SESSION['user_id'] , $_GET['story_id'] )){
        if($role == 'admin'){
            if(isset($_GET['storyview'])){
                header("location: admin/adminstoryview.php?story_id={$_GET['story_id']}");
            }
            else{
                header("location: admin/adminallstoryview.php");
            }
        }
        else{
            if(isset($_GET['storyview'])){
                header("location: User/storyview.php?story_id={$_GET['story_id']}");
            }
            else{
                header("location: User/allstoryview.php");
            }
        }
    }
}
else{
    session_unset();
    session_destroy();
    header('location: logout.php?Success=false');
}

?>