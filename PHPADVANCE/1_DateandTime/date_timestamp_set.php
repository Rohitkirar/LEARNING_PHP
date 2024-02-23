<?php 

/*
The date_timestamp_set() function sets the date and time based on a Unix timestamp.
Syntax
date_timestamp_set(object, unixtimestamp)

Return Value:	Returns the DateTime object for method chaining. FALSE on failure
*/
$date = date_create() ;

print_r($date);

date_timestamp_set($date , 1371803321);

echo date_format($date , "U = Y-m-d H:i:s");



?>