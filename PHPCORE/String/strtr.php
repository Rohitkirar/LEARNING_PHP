<?php 
/*
The strtr() function translates certain characters in a string.
Note: If the from and to parameters are different in length, both will be formatted to the length of the shortest.

Syntax
strtr(string,from,to) or strtr(string,array)

string -> Required. Specifies the string to translate
from -> Required (unless array is used). Specifies what characters to change
to	 -> Required (unless array is used). Specifies what characters to change into
array-> Required (unless to and from is used). An array containing what to change from as key, and what to change to as value
*/

$str = "Hello World";
echo(strtr($str , "eo" , "ai"));

echo("<br>\n");

$arr = array("Hello" => "Hi" , "World" => "earth");
echo(strtr("Hello World" , $arr));

echo("<br>\n");

$user = array("_name" => "Arun" ,  "_age" => 25);
echo(strtr("The boy name is _name and his age is _age" , $user) . "<br>\n");

$name = "RoHit kiRaR";
$x = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
$y = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
echo($name . "<br>\n");
echo(strtr($name , $x , $y));
?>