<?php 
/*
The substr_compare() function compares two strings from a specified start position.
Tip: This function is binary-safe and optionally case-sensitive.

SYNTAX : substr_compare(string1,string2,startpos,length,case)

Parameter	Description
string1 -> Required. Specifies the first string to compare
string2	-> Required. Specifies the second string to compare
startpos-> Required. Specifies where to start comparing in string1. If negative, it starts counting from the end of the string
length ->  Optional. Specifies how much of string1 to compare
case   ->  Optional. A boolean value that specifies whether or not to perform a case-sensitive compare: (FALSE - Default. Case-sensitive TRUE - Case-insensitive)

*/

$str = "Hello World!";

echo(substr_compare($str , "Hello" , 0 , 5 )); //0 - equals

echo("<br>\n");

echo(substr_compare($str , "World!" , 6));

echo("<br>\n");

echo(substr_compare("world", "or" , 1 , 2));
echo("<br>\n");
echo(substr_compare("world" , "ld" , -2 , 2 ));
echo("<br>\n");
echo(substr_compare("world", "orl" , 1 , 2));
echo("<br>\n");
echo(substr_compare("world" , "LD" , -2 , 2 ));
echo("<br>\n");
echo(substr_compare("world" , "LD" , -2 , 2  , TRUE));
echo("<br>\n");
echo(substr_compare("world" , "rl" , 1 , 2 ));

?>