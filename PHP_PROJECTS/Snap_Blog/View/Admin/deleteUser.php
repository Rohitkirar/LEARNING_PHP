<?php 
session_start();
if(isset($_SESSION['user_id'])){

    require_once('../../Class/Connection.php');
    require_once('../../Class/user.php');
    $user = new User();
    $userData = $user->userDetails($_SESSION['user_id']);

    if($userData['role'] != 'admin'){
        header('location: logout.php?logoutsuccess=false');
    }
        $user_id = $_GET['user_id'];

        $result = $user->deleteUser($user_id);
        if($result){
            $_SESSION['deleteUser'] = true;
            header('location: allUserDetails.php');
        }
        else
            header('location: allUserDetails.php');
}
else{
    header('location: ../logout.php?LogoutSuccess=false');
}
?>