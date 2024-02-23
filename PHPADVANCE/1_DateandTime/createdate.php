<?php 
/*
date_create() function returns a new datetime object.
SYNTAX
date_create(time , timezone);

Parameter	Description
time : (Optional) Specifies a date/time string. * NULL indicates the current time
timezone : (Optional) Specifies the timezone of time. Default is the current timezone.
*/
$date = date_create("2014/03/12");

print_r($date);

echo date_format($date , "Y/m/d") . "<br>\n";

//example 2 

$date = date_create("2013-03-15 23:40:00", timezone_open("Asia/Kolkata"));

echo date_format($date , "Y/m/d H:iP");

?>