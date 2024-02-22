<?php 
/*
microtime() function returns the current unix timestamp with microseconds 
Syntax 
microtime(return float) 

Parameter	Description
return_float	Optional. When set to TRUE it specifies that the function should return a float, instead of a string. Default is FALSE

Return Value:	Returns the string "microsec sec" by default, where sec is the number of seconds since the Unix Epoch (0:00:00 January 1, 1970 GMT), and microsec is the microseconds part. If the return_float parameter is set to TRUE, it returns a float representing the current time in seconds since the Unix epoch accurate to the nearest microsecond
*/

echo (microtime());

echo("<br>\n");

echo (microtime(true));

print_r(getdate(microtime(true)));
?>