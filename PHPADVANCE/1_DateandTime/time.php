<?php 
/*
Here some characters that are commonly used for times: 
    H-24-hour format (00 to 23)
    h-12-hour format (01 to 12)
    i-Minutes with leading zeros (00 to 59)
    s-Seconds with Leading zeros (00 to 59)
    a-Lowercase Ante Meridiem(am) and post meridiem(pm)

Note : the php date() fn will return the current date/time of the server!
*/
echo "The time is " . date("h:i:sa") . "<br>\n";

date_default_timezone_set("Asia/Kolkata"); //to set timezone

echo "The time is ". date("h:i:sa") . "<br>\n"; //12 hour format

echo "The time is ". date("H:i:sa") . "<br>\n"; // 24 hour format

echo "The time is ". date("Y:m:d h:i:sa") . "<br>\n";
?>