<?php 
/*
date_sun_info() returns an array containing information about sunset/sunrise and twilight begin/end for a specified day and location

SYNTAX 
date_sun_info(timestamp, latitutde , longitude);

return type
returns an associative array on success false on failure
*/
date_default_timezone_set("Asia/Kolkata");
$sun_info = date_sun_info(strtotime(date("Y-m-d")), 23.0225 , 72.5714);

foreach($sun_info as $key => $val){
    echo "$key : " . date("H:i:s", $val). "<br>\n";
}
?>