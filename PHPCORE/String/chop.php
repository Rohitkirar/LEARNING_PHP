<?php
/*
chop() removes whitespaces or other predefined characters from the righ end of a string.
*/

$str = "Hello World!";
echo($str);

echo("<br>\n");

echo(chop($str , "Hello"));

echo("<br>\n");

echo(chop($str, "ello World!"));

echo("<br>\n");

//removes new line from right end of the string
$str = "Hello World!\n\n";
echo(chop($str));
?>