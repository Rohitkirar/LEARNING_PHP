<?php 
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
?>