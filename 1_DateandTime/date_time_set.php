<?php 
/*
date_time_set() function sets the time
SYNTAX: 
date_time_set(object , hour , minute , second , microseconds);

Return Value:	Returns a DateTime object on success. FALSE on failure

Parameter Values
Parameter	Description
object	Required. Specifies a DateTime object returned by date_create()
hour	Required. Specifies the hour of the time
minute	Required. Specifies the minute of the time
second	Optional. Specifies the second of the time. Default is 0
microseconds	Optional. Specifies the microsecond of the time. Default is 0
*/

$date = date_create("2013-05-01");
date_time_set($date , 13, 24);
echo date_format($date , "Y-m-d H:i:s");

?>