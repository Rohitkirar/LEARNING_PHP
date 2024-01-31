<?php 
/**
 * 1. find the username from the given email using pure string function. ex : anant@gmail.com => answer : anant
 */
$str = "anant@gmail.com";

echo(strstr($str , "@" , true));


// $idx = stripos($str , "@");
// echo("UserName : " . substr($str ,0 ,  $idx));
?>