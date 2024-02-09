<?php 
/*
checkdate() function is used to validate a gregorian date;

SYNTAX 
checkdate(month , day , year);

Return Value:	TRUE if the date is valid. FALSE otherwise
*/

var_dump(checkdate(12,31,-400));

echo "<br>\n";

var_dump(checkdate(2,29,2003));

echo "<br>\n";

var_dump(checkdate(2,29,2092));

echo "<br>\n" ;

// Example 2 ;
Echo "Example 2 : <br>\n";

$date = "29/12/2023" ;

$datearray = explode("/" , $date);

if(checkdate($datearray[1] , $datearray[0]  , $datearray[2]))
    echo "the date is valid";
else
    echo "the date is invalid";

?>