<?php 
/*
The str_shuffle($str) function randomly shuffles all the characters of a string.
*/

$txt = "Hello World";
echo(str_shuffle($txt));

echo("<br>\n");

//eg 2
$str = "Don't judge a book by its cover";
echo($str);

echo("<br>\n");

$shufflestr = str_shuffle($str);
echo($shufflestr);

?>