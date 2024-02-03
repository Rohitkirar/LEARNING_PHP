<?php 

$name = $email = $website = $comment = $gender = "";

if($_SERVER['REQUEST_METHOD'] = "POST"){
    if(isset($_POST)){
        $name = test_input($_POST['name']) ;
        $email = test_input($_POST['email']) ;
        $website = test_input($_POST['web']) ;
        $pattern = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i" ;
        if(preg_match_all($pattern , ))
        $websiteErr = "";
        $comment =  test_input($_POST['comment']);
        $gender = test_input($_POST['gender']) ;
    }
    $userdetails = compact("name" , "email" , "website" , "comment" , "gender");
    print_r($userdetails);
}

function test_input($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>