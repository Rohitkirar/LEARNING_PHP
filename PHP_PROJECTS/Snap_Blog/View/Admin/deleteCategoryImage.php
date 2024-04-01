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
        header('location: ../logout.php?logoutsuccess=false');
    }
    $category_id = $_GET['category_id'];

    $result = $category->updateCategory($category_id , ['image' => '']);

    if($result){
        header("location: editCategorydetails.php?category_id=$category_id");
    }
    else{
        echo "ERROR " . mysqli_error($conn);
    }
}
else{
    header('location: ../logout.php?logoutsuccess=true');
}

?>