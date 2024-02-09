<?php 
/*
the date diff() function  returns the difference between two date time objects
SYNTAX 
date_diff(datetime1 , datetim2 , absolute);

Return Value:	Returns a DateInterval object on success that represents the difference between the two dates. FALSE on failure
Parameter Values
Parameter	Description
datetime1	Required. Specifies a DateTime object
datetime2	Required. Specifies a DateTime object
absolute	Optional. Specifies a Boolean value. TRUE indicates that the interval/difference MUST be positive. Default is FALSE
*/

$date1 = date_create("2021-04-12 11:20:34");
$date2 = date_create("2011-12-12");

$diff = date_diff($date1 , $date2);

echo "$diff->y years , $diff->m and $diff->d days";

echo("<br>\n");
//Example 2 calculate the age 

$birthdate = date_create("01-01-2001");

$diff = date_diff($birthdate , date_create(date("Y-m-d")));

echo("The age is : $diff->y years $diff->m months $diff->d days");
?>