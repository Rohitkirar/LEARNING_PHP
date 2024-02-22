<?php 
/*
addslashes($string) returns a string with backslashes in front of predefined charaters
predefined character are single, double quote , backslash , NULL
to undo slahes use stripslashes($str) function
*/

$str = "22 \\ jan\\ 2024 is a 'histroical' day for the \"Hindus\" .";

echo($str);

echo("<br>\n");

$x = addslashes($str);

echo($x);

echo("<br>\n");

// echo(addslashes("NULL"));

// to undo/ strip slashes use stripslashes($str);

echo(stripslashes($x));

$x = stripslashes($x);

echo("<br>\n");

echo(stripslashes($x));
?>