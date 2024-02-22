<?php 
/*
date_timestamp_get() function returns the unix timestamp
Syntax
date_timestamp_get(object)
Return Value:	Returns the Unix timestamp that represents the date
*/

$date = date_create();

echo date_timestamp_get($date) . "<br>\n";
$x =0 ;

while($x < 10){
echo date_timestamp_get($date) . "<br>\n";
$x++;
}

?>