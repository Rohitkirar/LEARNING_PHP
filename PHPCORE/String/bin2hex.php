<?php 
/*
bin2hex($string) functin converts a string of ASCII characters to hexadecimal
return the hexadecimal value of the string
*/

$str = "Hello World!";

echo(bin2hex($str));

echo("<br>\n");

echo pack("H*" , bin2hex($str));

?>