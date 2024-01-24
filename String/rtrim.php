<?php 

/*
rtrim($str) : it returns string by removing right side whitespaces
rtrim($str , "substr") : it returns the string by removing the substr from right of the string
*/

$str = "Hello World!   " ;

echo(rtrim($str));

echo("<br>\n");

$str = rtrim($str);

echo(rtrim($str , "World!"));

echo("<br>\n");

echo (rtrim($str , "Hello"));


?>