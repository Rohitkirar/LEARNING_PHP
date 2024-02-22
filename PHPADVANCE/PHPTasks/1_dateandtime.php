<?php 
//1) get current hours, and check if hours smaller then 8 print good morning, bigger then 8 and smaller then 16 then print good afternoon, and in the last print good evening.
date_default_timezone_set("Asia/Kolkata");

$currenthour = date("H");

if($currenthour < 8)
    echo "GOOD MORNING. <br>" ;

else if($currenthour>8 && $currenthour < 16)
    echo "GOOD AFTERNOON. <br>";

else
    echo "GOOD EVENING <br>" ;


?>