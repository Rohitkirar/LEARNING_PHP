<?php
/*
The strchr() function searches for the first occurrence of a string inside another string.
This function is an alias of the strstr() function.
Note: This function is binary-safe.
Note: This function is case-sensitive. For a case-insensitive search, use stristr() function.
*/ 

echo(strchr("Hello peoples of the world" , "people"));

echo("<br>\n");

echo(strchr("Just do what you want" ,  "just")); // case sensitive

echo("<br>\n");

echo(strchr("Just do what you want" ,  "Just"));

echo("<br>\n");

echo(strchr("hello world" , ""));

?>