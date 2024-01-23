<?php 
/*
The str_pad($str , len , "addstr"); function pads a string to a new length.
*/
$str = "Hello World!";

echo $str;

echo("<BR>\n");

echo ("Current len of string : " . strlen($str));

echo("<br>\n");

$newStr = str_pad($str , 20 , ".");

echo($newStr);
echo("<br>\n");
echo("the length of string after padding : " . strlen($newStr));
?>