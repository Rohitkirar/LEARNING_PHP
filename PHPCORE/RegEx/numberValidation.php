<?php 
// Number can only starts with 8 or 9 and contains 10 digit
$number = "8320327806";
$pattern = "/^[8-9][0-9]{9}$/";

if(preg_match_all($pattern , $number)){
    echo("valid number<br>\n");
}
else{
    echo("Invalid number.<br>\n");
}
?>