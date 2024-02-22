<?php 
/*
date_format() function returns a date formatted according to the specified format
Note : This fn does not use locales(all output is in english)
Syntax
date_format(object, format)

Return Value:	Returns the formatted date as a string. FALSE on failure
*/

$date = date_create("2013-03-15");

echo date_format($date, "Y/M/d H:i:sa");
?>