<?php 
/*
The strncasecmp() function compares two strings.
Note: The strncasecmp() is binary-safe and case-insensitive.
Tip: This function is similar to the strcasecmp() function, except that strcasecmp() does not have the length parameter.
Syntax
strncasecmp(string1,string2,length); //case-insensitive
*/
echo strncasecmp("Hello World" , "hello World" , strlen("Hello World"));

echo("<br>\n");

echo strncasecmp("Hello World" , "Hello Earth" ,6);

echo("<br>\n");

echo(strncasecmp("Hello World" ,"hello World" , 6));
?>