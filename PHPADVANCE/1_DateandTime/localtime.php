<?php 
/*DOUBT
localtime() function returns the local time as an indexed and as an associative array;
Syntax 
localtime(timestamp , is_assoc);
Return Value:	Returns an array that contains the components of a Unix timestamp
*/
date_default_timezone_set("Asia/Kolkata");
print_r(localtime());

echo("<br>\n");

print_r(localtime(time() , true));
?>