<?php 
/*
list() function is used to assign values to a list of variables in one operation
Syntax
list(var1, var2, ...)
*/
$arr = ["Dog" , "Cat" , "Horse"];
list($a , $b , $c ) = $arr;
echo("I have several animals , a $a , a $b and a $c.");

echo("<br>\n");

$arr1 = ["Dog" , "Cat" , "Horse"];
list($a1 , , $c1) = $arr1;
echo("Here I only use the $a and $c variables.");
?>