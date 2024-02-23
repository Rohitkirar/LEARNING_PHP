<?php 
/* 
ceil() ; round numbers up to the nearest  integer
always return in float
*/

echo(ceil(0.60) . "<br>\n");
echo(ceil(0.40) . "<br>\n");
echo(ceil(5) . "<br>\n");
echo(ceil(5.1) . "<br>\n");
echo(ceil(-4.1) . "<br>\n");
echo(ceil(-3.9) . "<br>\n");

// var_dump(ceil(-3.9) ); // return type is float

var_dump(ceil(true)); 
var_dump(ceil("str")); //error
?>