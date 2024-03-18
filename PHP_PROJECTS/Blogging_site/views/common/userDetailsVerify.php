<?php 

function userVerification($user_id , $conn) : array{

    $sql = "SELECT CONCAT(first_name , ' ' , last_name) as full_name , role 
            From users 
            WHERE id = {$_SESSION['user_id']} ";
            
    $result = mysqli_query($conn , $sql);

    $userDetails = mysqli_fetch_assoc($result);
        
    return $userDetails;
}
?>