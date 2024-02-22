<?php 
/*
The strcmp() function compares two strings.

Note: The strcmp() function is "binary-safe" and "case-sensitive".

This function is similar to the strncmp() function, 
the difference that you can specify the number of characters from each string to be used in the comparison with strncmp().
*/

echo(strcmp("Hello world" , "Hello"));

echo("<br>\n");

echo(strcmp("Hello" , "Hello World"));

echo("<br>\n");

echo(strcmp("Hello World" , "Hello World"));

echo("<br>\n");

echo(strcmp("Hello World" , "Hello world "));
?>