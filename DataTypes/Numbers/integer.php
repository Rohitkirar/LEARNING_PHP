<?php

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

?>