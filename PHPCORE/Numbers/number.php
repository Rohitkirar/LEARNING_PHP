<?php
/* 
There are three main numeric types in php 
1) Integer
2) Float
3) Number Strings
and two additional types that are 
4) NAN - Not a Number
5) Infinity
*/

//numeric variables
$x = 1000;
$y = 543.4523;
$z = "225";
var_dump($x);
var_dump($y);
var_dump($z);

/*
PHP INFINITY
function to check a number is finite or infinite;
is_finite();
is_infinite();
*/

var_dump(is_finite("3484357"));
var_dump(is_infinite("8320048323890409"));

?>