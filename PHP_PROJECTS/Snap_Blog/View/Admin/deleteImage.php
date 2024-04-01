<?php 
session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../Class/Connection.php');
    require_once('../../Class/User.php');
    require_once('../../Class/StoryImage.php');
    $user = new User();
    $image = new StoryImage();

    $userData = $user->userDetails($_SESSION['user_id']);

    if($userData[0]['role'] != 'admin'){
        header('location: ../logout.php?logoutsuccess=false');
    }

    $image_id = $_GET['image_id'];
    $story_id = $_GET['story_id'];

    if($image->deleteImage($image_id)){
        header("location: updateStoryForm.php?story_id=$story_id");
    }
    else{
        header("location: updateStoryForm.php?story_id=$story_id");
    }

}
else{
    header('location: ../logout.php?logoutsuccess=false');
}

?>