<?php 
/* 
Task 4 : string palindrome check
*/
$str = "hooh";

//method 1 

$x = strcmp($str , strrev($str));
if($x==0)
    echo("Palindrome string");
else
    echo("NOT a Palindrome string");
echo("<br>\n");

//method 2

$strrev = strrev($str);
if($str === $strrev)
    echo("Palindrome string");
else
    echo("NOT a Palindrome string");
?>