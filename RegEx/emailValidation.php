<?php 
$try = 1 ;
while($try){

    $email = readline("Enter your email : ");

    $pattern = "/[A-Za-z]+[_\-\.]?[A-Za-z0-9]+[_\-\.]?[A-Za-z0-9]+@(gmail|yahoo|outlook|mail)\.(com|in)/" ;

    $result = preg_match($pattern , $email , $matcharray);

    if($result)
        echo "Valid email";
    else
        echo "Invalid email";

    echo("\n<br>\n");

    $try = (int)readline("enter : 0 -> exit or press number -> try again : ");
    
    echo("<br>\n");
}
?>