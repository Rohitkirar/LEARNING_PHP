<?php 
/*
reset()  fn moves the internal pointer to the first element of the array.

Syntax
reset(array)

Return Value:	Returns the value of the first element in the array on success, or FALSE if the array is empty
*/

$people = ["Peter" , "joe" , "Glenn" , "Cleveland"];
echo(current($people) . "<br> \n");
echo(next($people) . "<BR>\n");

echo(reset($people));
?>