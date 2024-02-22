<?php 
/*
The preg_split() function breaks a string into an array using matches of a regular expression as separators.
Syntax
preg_split(pattern, string, limit, flags)
Return Value:	Returns an array of substrings where each item corresponds to a part of the input string separated by a match of the regular expression
*/

Echo "Example 1 : <br>\n";

$date = "1970-01-01 00:00:00";
$pattern = "/[-\s:]/";

$components = preg_split($pattern , $date );

print_r($components);

Echo "<br>\n";

Echo "Example 2 : <br>\n" ;

$date = "2020-01-23 12:34:32" ;
$pattern = "/([-\s:])/" ;
$components = preg_split($pattern , $date , -1 , PREG_SPLIT_DELIM_CAPTURE);
print_r($components);

Echo "<br>\n";

Echo "Example 3 : <br>\n";

$date = "1234-31-01" ;
$pattern = "/-/" ;
$components = preg_split($pattern , $date , -1 , PREG_SPLIT_OFFSET_CAPTURE);

print_r($components);
?>