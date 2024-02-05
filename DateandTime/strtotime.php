<?php 
/*
strtotime() function is used to convert a human readable date string into a Unix timestamp 
SYNTAX 
strtotime(time , now);

Note : However, strtotime() is not perfect, so remember to check the strings you put in there.
*/
//example below creates a date and time from the strtotime() function:
date_default_timezone_set("Asia/Kolkata");

$d = strtotime("10:20pm april 12 2233");

echo "created date is : " . date("Y-m-d H-i-sa" , $d) . "<br>\n";

$tomorrow = strtotime("tomorrow");

echo date("Y-m-d h:i:sa" , $tomorrow) . "<br>\n";

echo date("Y-m-d h:i:sa" , strtotime("next Saturday")) . "<br>\n";

echo date("Y-m-d h:i:sa" , strtotime("+3 months")) . "<br>\n";

// Example 2 : 
echo "EXAMPLE 2 : <br>\n";
$startdate  = strtotime("Saturday");
$enddate = strtotime("+6 weeks" , $startdate);

while($startdate < $enddate){
    echo date("M d" , $startdate) . "<br>\n";
    $startdate = strtotime("+1 week" , $startdate);
}

//Example 3 ;
Echo "EXAMPLE 3 : <br>\n";

echo time() . "<br>\n";

$d1 = strtotime("february 15");
$d2 = ceil(($d1-time())/60/60/24);

echo "There are " . $d2 . "days until 15 of Febraury" . "<br>\n";

//Example 4 : 

Echo "EXAMPLe 4 : Age calculation :  <br>\n";

$dateofbirth = strtotime("February 15 2002");
$birthyear = date("Y" , $dateofbirth);
$birthmonth = date("m" , $dateofbirth);
$birthday = date("d" , $dateofbirth);

$curryear = date("Y");
$currmonth = date("m");
$currday = date("d");

echo $curryear-$birthyear . " years " . $currmonth-$birthmonth . " months " . $currday-$birthday . " days <br>\n" ;


?>