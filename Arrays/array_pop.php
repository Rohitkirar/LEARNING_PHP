<?php 
/*
array_pop() function return and  deletes the last element of an array
Syntax :  array_pop(array)

Return Value:	Returns the last value of array. If array is empty, or is not an array, NULL will be returned.
*/
$a = ["red" , "green" , "blue"] ;
echo(array_pop($a) . "<br>\n");

print_r($a);
?>