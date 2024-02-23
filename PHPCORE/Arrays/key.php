<?php 
/*
key() function returns the element key from the current internal pointer
This function returns FALSE on error.
Syntax
key(array)
Return Value:	Returns the key of the array element that is currently being pointed to by the internal pointer
*/
$people = ["Peter" , "Joe" , "Glenn" , "CleveLand" ];
echo("The key from the current position is : " . key($people));
echo("<br>\n");
echo(current($people));
?>