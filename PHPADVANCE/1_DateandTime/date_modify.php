<?php 
/*
date_modify() function modifies the timestamp
Syntax
date_modify(object, modify)
Return Value:	Returns a DateTime object on success. FALSE on failure

Parameter Values
Parameter	Description
object	Required. Specifies a DateTime object returned by date_create()
modify	Required. Specifies a date/time string
*/

$date = date_create("2013-05-01");
date_modify($date , "+2 years 15 days" );

echo date_format($date , "Y-m-d");

echo "<br>\n" ;

$date = date_create("2013-05-01");
date_modify($date , "-2 years 15 days" );

echo date_format($date , "Y-m-d");

?>