<?php 
/*
prev() function moves the internal pointer to and output the previous element in the array
Syntax
prev(array)
Return Value:	Returns the value of the previous element in the array on success, or FALSE if there are no more elements
*/
$people = ["Peter" , "Joe" , "Glenn" , "Cleveland" ];
echo(current($people) . "<br>\n");
echo(next($people). "<br>\n");
echo(prev($people) . "<br>\n");
?>