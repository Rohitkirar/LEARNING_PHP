<?php 
/* 
The end() function moves the internal pointer to, and outputs, the last element in the array.
Syntax
end(array)
Return Value:	Returns the value of the last element in the array on success, or FALSE if the array is empty
*/

$people = ["Peter" , "Joe" , "Glenn" ,"CleveLand"];
echo(current($people) . "<br>\n");
echo(end($people));
?>