<?php
/*
The substr_replace() function replaces a part of a string with another string.
Note: If the start parameter is a negative number and length is less than or equal to start, length becomes 0.
Note: This function is binary-safe.

Syntax : substr_replace(string,replacement,start,length)
*/

echo(substr_replace("Hello" , "World" , 0  ));

echo("<br>\n");

echo(substr_replace("Hello World" , "earth" , 6));

echo("<br>\n");

echo(substr_replace("World" , "Hello " , 0 ,0 ));

echo("<br>\n");

echo(substr_replace("Hello " , "World" , 6));

echo("<br>");

$replace = array("1: AAA" , "2: AAA" , "3: AAA");
print_r($replace);

echo implode("<br>\n" , substr_replace($replace , "BBB" , 3 , 3));

echo("<br>\n");

$replace = implode("<br>\n" , substr_replace($replace , "BBB" , 3 , 0));

print_r($replace);
?>