<?php 
/*
date_create_from_format() function returns a new Datetime object formatted according to the specified format.
SYNTAX 
date_create_from_format(format , time , timezone);

Return Value:	Returns a new DateTime object on success. FALSE on failure
*/
$date = date_create_from_format("j-M-Y" , "15-March-2013" );

print_r($date);

echo date_format($date , "Y/m/d h:i:sa") . "<br>\n" ;
?>