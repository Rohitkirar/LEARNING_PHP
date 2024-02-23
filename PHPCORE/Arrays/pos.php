<?php 
/*
pos() function returns the value of the current element in an array
This function is an alias of the current() function.
Syntax
pos(array)

Return Value:	Returns the value of the current element in an array, or FALSE on empty elements or elements with no value
*/
$people = ["Peter" , "Joe" , "Glenn" , "Cleveland"];
echo(pos($people) . "<br>\n");
?>