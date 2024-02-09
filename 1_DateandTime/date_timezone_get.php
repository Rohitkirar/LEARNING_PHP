<?php 
/*
date_timezone_get(object) : function returns the time zone of the given DateTime object
Syntax
date_timezone_get(object)

Return Value:	Returns a DateTimeZone object on success. FALSE on failure
*/
$date = date_create("23-11-12", timezone_open("Asia/Kolkata"));

$tz = date_timezone_get($date);
print_r($tz) ; 
echo("<br>\n");
echo timezone_name_get($tz);
?>