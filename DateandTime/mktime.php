<?php 
/*
mktime() function returns the unix timestamp for a date.
SyntaX 
mktime(hour , minute , second , month , day , year);
*/

$d = mktime(9 , 44 , 12 , 9 , 23 , 2023 );
echo "Created date is " . date("Y-m-d h:i:sa" , $d);


echo "<br>\n";
//Example 1 ;
date_default_timezone_set("Asia/Kolkata");

$employejoiningdate = mktime( 9, 30 , 00 , 1 , 15 , 2024);

$str =  date("Y/m/d H:i:sa " , $employejoiningdate);

echo "&copy $str- " . date("Y/m/d H:i:sa") . "<br>\n";

$totalyearsworked = abs(date("Y") - date("Y" , $employejoiningdate));
$totalmonthsworked = (date("m") - date("m", $employejoiningdate));
$totaldaysworked =  date("d") - date("d", $employejoiningdate);

echo "Total employee working details : \nYear : $totalyearsworked \nMonth : $totalmonthsworked \nDays : $totaldaysworked" . "<br>\n"; 
?>