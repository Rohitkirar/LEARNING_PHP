<?php 

    $txt = $_SERVER['REQUEST_URI'];
    $userdata = explode("?" , $txt);
    array_shift($userdata);
    echo "<h2>" . "User Data Successfully Validated" . "</h2>" ;
    echo "Name : " . str_ireplace("%20" , " " , array_shift($userdata)) ."<br>";
    echo "Date Of Birth : " .array_shift($userdata) ."<br>";
    echo "gender : " .array_shift($userdata) ."<br>";
    echo "email : " .array_shift($userdata) ."<br>";
    echo "contact number : " .array_shift($userdata) ."<br>";
    echo "state : " . str_ireplace("%20" , " " , array_shift($userdata)) ."<br>";
    echo "city : " .array_shift($userdata) ."<br>";
    echo "address : " . str_ireplace("%20" , " " , array_shift($userdata)) ."<br>";
    echo "Skills : <br>" ; 
    print_r($userdata);

?>