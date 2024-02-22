<?php 
/*
ltrim($str) : it return a string by removing left whitespaces from it;
ltrim($str , "substr") it returns a string by removing left side matching substr;
*/
$x = "   Hello World!";

echo(ltrim($x));

echo("<br>\n");

$x = "Hello World";

echo(ltrim($x, "Hello"));

echo("<br>\n");

echo(ltrim($x , "World"));
?>