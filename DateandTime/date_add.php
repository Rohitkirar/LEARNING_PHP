<?php 
/*
date_add() function adds some days, months , years hours, minutes and seconds to a date.

Syntax : 
date_add(object , interval);

return a datetime object  on success / false on failure
*/
$date = date_create("2013-03-15");

date_add($date , date_interval_create_from_date_string("10 hours 40 days"));

echo date_format($date , "Y-m-d H") . "<bh>\n";


// Example 2 ; 

$birth_date = date_create("12/02/2002");

date_add($birth_date , date_interval_create_from_date_string("22 years 10 days"));

echo date_format($birth_date , "Y/m/d");

?>