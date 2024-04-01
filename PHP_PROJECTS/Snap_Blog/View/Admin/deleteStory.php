<?php 

session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../Class/Connection.php');
    require_once('../../Class/User.php');
    require_once('../../Class/Story.php');
    
    $user = new User();
    $story = new Story();

    $userData = $user->userDetails($_SESSION['user_id']);

    if($userData['role'] != 'admin'){
        header('location: ../logout.php?logoutsuccess=false');
    }
    $story_id = $_GET['story_id'];

    $result = $story->deleteStory($story_id);
    
    if($result){
        if(isset($_GET['status'])){
            $_SESSION['storydelete'] = true;
            header('location: storydashboard.php');
        }
        else{
            $_SESSION['storydelete'] = true;
            header('location: admin.php');
        }
    }
    else
        header('location: admin.php');
}
else{
    header('location: ../logout.php?logoutsuccess=false');
}

?>