<?php 
/*
The PHP is_numeric() fun can be used to find whether a variable is numeric. The function returns true if the variable is a numeric or a numeric string otherwise false

NOTE : this fun() return false for numeric string in hexadecimal form as they are no longer considered as numeric string
*/

$x = 5884;
var_dump(is_numeric($x));

$x = "5393";
var_dump(is_numeric($x));

$x = "40.32" + 100;
var_dump(is_numeric($x));

$x = "hello";
var_dump(is_numeric($x));



?>