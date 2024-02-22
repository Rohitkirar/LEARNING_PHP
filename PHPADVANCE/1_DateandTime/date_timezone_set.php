<?php 
/*
date_timezone_set() function sets the timezone for the datetimeobject
Syntax
date_timezone_set(Object , timezone);

Return Value:	Returns the DateTime object for method chaining. FALSE on failure

parameter : -
object	Required. Specifies a DateTime object returned by date_create(). This function modifies this object
timezone	Required. Specifies a DateTimeZone object that represents the desired time zone.
*/
$date = date_create("2023-05-25" , timezone_open("Asia/kolkata"));

echo date_format($date , "Y-m-d H:i:sP");
?>