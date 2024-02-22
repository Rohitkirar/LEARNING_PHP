<?php 
/*
strstr() use to find a substring and return the string after that word (case sensitive)
stristr() use to find a substring in string and return string after that word (case insensitive);
*/
$str = "Hello world is the first program ";
echo(strstr($str,"world"));
echo("<br>\n");
echo(strstr($str,"World")); // doesn't return anything as it is case sensitive

// stristr($str , sub) (case insensitive);

echo(stristr($str , "world"));

echo("<br>\n");

echo(stristr($str , "World"));
?>