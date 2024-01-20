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


//Integer 
/*
Here are some rules for integers:

An integer must have at least one digit
An integer must NOT have a decimal point
An integer can be either positive or negative
Integers can be specified in three formats: decimal (10-based), hexadecimal (16-based - prefixed with 0x) or octal (8-based - prefixed with 0) 

integer constant 
PHP_INT_MAX : return maximum integer value
PHP_INT_MIN : return minimum integer value
PHP_INT_SIZE : return the size of int in byte

function to check the variable is of integer or not
is_int()
is_integer()
is_long()
*/
$max = PHP_INT_MAX;
$min = PHP_INT_MIN;
$size = PHP_INT_SIZE;
echo ($max);
echo("<br>\n") ;
echo($min);
echo("<br>\n");
echo($size);
echo("<br>\n");
var_dump(is_int(4343));
echo("<br>\n");
var_dump(is_int(4343.48390));
echo("<br>\n");
var_dump(is_int("4343"));

/*
PHP Float
float constant
PHP_FLOAT_MAX
PHP_FLOAT_MIN
PHP_FLOAT_DIG
PHP_FLOAT_EPSILON

function to check that the variable is of float or not
is_float();
is_double();
*/

$m = 549.2303482;
$n = 3248012.234;
echo "<br>\n";
var_dump(is_float($m));
var_dump(is_double($n));
echo "<br>\n";
echo (PHP_FLOAT_MAX);
echo "<br>\n";
echo (PHP_FLOAT_MIN);
echo "<br>\n";
echo (PHP_FLOAT_DIG);
echo "<br>\n";
echo (PHP_FLOAT_EPSILON);
echo("<br>\n");
/*
PHP INFINITY
function to check a number is finite or infinite;
is_finite();
is_infinite();
*/

var_dump(is_finite("3484357"));
var_dump(is_infinite("8320048323890409"));

?>