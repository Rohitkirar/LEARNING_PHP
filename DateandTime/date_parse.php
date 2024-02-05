<?php 
/*
date_parse() function returns an associative array with detailed information about a specified date.
Syntax 
date_parse(date)
return type 
returns an associative array containing information about the parsed date on success. False on failure
*/

$datearray = date_parse(date("Y/m/d h:i:s"));

print_r($datearray);

echo $datearray['year']  . "<br>\n" ;
echo $datearray['month'] . "<br>\n" ;
echo $datearray['day'] . "<br>\n" ;
?>