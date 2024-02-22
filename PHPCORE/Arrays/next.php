<?php 
/*
next() function moves the internal pointer to and outputs the next element in the array;
Syntax
next(array)
Parameter Values
Parameter	Description
array	Required. Specifies the array to use
Return Value:	Returns the value of the next element in the array on success, or FALSE if there are no more elements
*/
$people = ["Peter" , "Joe" , "Glenn"  , "Cleveland"];
echo(current($people) . "<br>\n");
echo(next($people)  . "<br>\n");
echo(current($people) . "<br>\n");
?>