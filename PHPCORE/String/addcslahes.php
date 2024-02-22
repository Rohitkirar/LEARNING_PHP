<?php 
/* 
The addcslahes($string , "char") function returns a string with backslahes infront of the specified characters
addcslahes() is a case sensitive function 

to undo changes use stripcslashes($string )  but doesn't work with escape character;
*/
$str = "Fight Yourself to Beat your own Records";

echo(addcslashes($str , "w"));

echo("<br>\n");

//we can also give a range of characters here 

echo(addcslashes($str , "A..Z"));

echo("<br>\n");

$x = addcslashes($str , "a..z");
echo($x);

echo("<br>\n");

// stripcslashes($str); it return unslashed string

echo("TO strip slashes from string : ");

echo("<br>\n");

echo(stripcslashes("Hello /world"));//only removes backward slahes

echo("<br>\n");

echo(stripcslashes("Hello \world"));


?>