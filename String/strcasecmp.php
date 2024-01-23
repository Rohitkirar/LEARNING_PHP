<?php 
/*
The strcasecmp($str1 , $str2) function compares two strings.
Tip: The strcasecmp() function is "binary-safe" and "case-insensitive".


Return Value:	This function returns:
0 - if the two strings are equal
<0 - if string1 is less than string2
>0 - if string1 is greater than string2
*/

$str1 = "HELLO WORLD" ;
$str2 = "hello world" ; 

echo(strcasecmp($str1 , $str2));

echo("<br>\n");

echo(strcasecmp("world" , "hello woRLD of the New India"));

echo("<br>\n");

echo(strcasecmp("Hello world twinkle" , "world"));

?>