<?php 
/*
date() fn is used to format a date or a time.
The function formats a timestamp to a more readable date and time
SYNTAX
date(format , timestamp);

Here,
format : Required, Specifies the format of the timestamp
timestamp : optional, Specifies a timestamp. Default is the current date and time.

TIMESTAMP : a timestamp is a squence of characters, denoting the date and time at which a certain event occurred.

*/

echo "Today is " . date("Y/M/D") . "<br>\n" ;
echo "Today is " . date("y.m.d") . "<br>\n" ;
echo "Today is " . date("Y-m-d") . "<br>\n" ;
echo "Today is " . date("y/m/d") . "<br>\n" ;  
echo "Today is " . date("l") . "<br>\n" ; //print current date

// PHP Tip - Automatic Copyright Year

echo "&copy; 2010-" .  date("Y");
?>