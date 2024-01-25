<?php 
/*
base_convert() function converts a number from one number base to another
SYNTAX : base_convert($num , frombase , tobase);
RETURN TYPE : STRING
*/
$hex = "E196";
echo(base_convert($hex , 16 , 8) . "<br>\n");

$oct = "0031";
echo(base_convert($oct , 8 , 10) . "<br>\n");

$oct = "364";
echo(base_convert($oct , 8 , 16) . "<br>\n");
?>