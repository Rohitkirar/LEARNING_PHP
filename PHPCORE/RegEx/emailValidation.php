<?php 


    $email = "rohit13@gmail.com";

    $pattern = "/^[A-Za-z]+[_\-\.]?\w+[_\-\.]?[A-Za-z0-9]+@(gmail|yahoo|outlook|mail)\.(com|in)$/" ;

    $result = preg_match($pattern , $email , $matcharray);

    if($result)
        echo "Valid email";
    else
        echo "Invalid email";

    echo("\n<br>\n");

?>