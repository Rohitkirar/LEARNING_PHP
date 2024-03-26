<?php 

session_start();

if(isset($_SESSION['user_id'])){

    require_once('../../database/connection.php');
    
    require_once('../common/userDetailsVerify.php');

    $userData = userVerification($_SESSION['user_id'] , $conn);

    if($userData['role'] == 'admin'){

        $story_id = $_GET['story_id'];

        $sql = "UPDATE story JOIN storyimages ON story.id = storyimages.story_id 
                SET story.deleted_at = CURRENT_TIMESTAMP , storyimages.deleted_at = CURRENT_TIMESTAMP 
                WHERE storyimages.story_id = $story_id ";

        $result = mysqli_query($conn , $sql);

        if($result){
            header('location: admin.php');
        }
        else
            echo "ERROR " . mysqli_error($conn);
    }
    else{
        session_unset();
        session_destroy();
        header('location: ../common/logout.php?LogoutSuccess=true');
    }
}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php?LogoutSuccess=true');
}

        
    // delete story from db using form

    // if(isset($_POST['delete'])){
    //     $story_id = $_POST['delete'];
    //     $sql = "UPDATE story JOIN images ON story.id = images.story_id 
    //             SET story.deleted_at = CURRENT_TIMESTAMP , images.deleted_at = CURRENT_TIMESTAMP 
    //             WHERE images.story_id = $story_id ";
    //     $result = mysqli_query($conn , $sql);
    //     if($result){
    //         header('location: adminStoryGridView.php');
    //     }
    //     else{
    //         header('location: Admin.php');
    //     }
    // }
?>