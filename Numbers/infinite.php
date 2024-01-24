<?php 
/*
A numeric value that is larger than PHP_FLOAT_MAX is considered infinite
to check a number is finite or infinite we have two functions : 
is_finite()
is_infinite()
*/

$x = 5398598320;
var_dump(is_finite($x));
var_dump(is_infinite($x));
?>