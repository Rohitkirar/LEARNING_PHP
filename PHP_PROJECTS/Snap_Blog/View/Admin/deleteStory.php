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
        header('location: ../common/logout.php?LogoutSuccess=false');
    }
        $story_id = $_GET['story_id'];

        $result = $story->deleteStory($story_id);
        
        if($result){
            $_SESSION['storydelete'] = true;
            header('location: admin.php');
        }
        else
            header('location: admin.php');
}
else{
    header('location: ../common/logout.php?LogoutSuccess=false');
}

?>