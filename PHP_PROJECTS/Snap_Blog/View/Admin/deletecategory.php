<?php 
session_start();


if(isset($_SESSION['user_id'])){

    require_once('../../Class/Connection.php');
    require_once('../../Class/User.php');
    require_once('../../Class/StoryCategory.php');

    $user = new User();
    $category = new StoryCategory();

    $userData = $user->userDetails($_SESSION['user_id']);

    if($userData[0]['role'] != 'admin'){
        header('location: ../logout.php?LogoutSuccess=false');
    }

    $category_id = $_GET['category_id'];

    if($category->deleteCategory($category_id)){
        $_SESSION['deletecategory'] = true;
        header('location: CategoryDetails.php');
    }
    else{
        print_r($category->deleteCategory($category_id));
        // header('location: CategoryDetails.php');
    }
            
}
else{
    header('location: ../logout.php?LogoutSuccess=false');
}
?>