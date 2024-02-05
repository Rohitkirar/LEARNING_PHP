<?php 
/*
date_default_timezone_set() function set the default timezone used by all date/time/functions in the script.
Syntax
date_default_timezone_set(timezone)

Return Value:	Returns FALSE if the timezone is not valid. TRUE otherwise
*/

echo date_default_timezone_get() . " <br>\n";

var_dump(date_default_timezone_set("Asia/Kolkata"));

echo date_default_timezone_get() . " <br>\n";

?>