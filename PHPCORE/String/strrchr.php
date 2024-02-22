<?php 
/*
The strrchr() function finds the position of the last occurrence of a string within another string
returns all characters from this position to the end of the string.
Note: This function is binary-safe.
strrchr() is a case sensitive function
Syntax : strrchr(string,char)
*/

$str = "Hello World!";
echo(strrchr($str , 'World'));

echo("<br>\n");

echo strrchr($str , "el");

echo("<br>\n");

$x = "Hello What World!. What a beautiful day";

echo(strrchr($x , "What"));

echo("<br>\n");

//we also pass num for reference in ASCII table
echo strrchr("Hello A world!",65);

echo("<br>\n") ;

echo(strrchr("Hello A World" , 101));

echo("<br>\n");

echo("print");
?>