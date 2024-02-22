<?php 
/*
date_default_timezone_get() function returns the default timezone used by all date/time functions in the script
SyNTAX
date_default_timezone_get();
Return Value:	Returns the timezone as a string
*/
date_default_timezone_set("Asia/kolkata");

print(date("Y/m/d h:i:sa"));

echo("<br>\n");

echo date_default_timezone_get() ;
?>