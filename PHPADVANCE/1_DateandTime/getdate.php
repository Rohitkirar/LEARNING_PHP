<?php 
/*
getdate(timestamp) return an associative array with information related to timestamp
SYNATax 
getdate(timestamp);

Parameter	Description
timestamp	Optional. Specifies an integer Unix timestamp. Default is the current local time (time())

return type
returns an associative array with information related to the timestamp
*/

print_r(getdate());

$date = getdate() ;

foreach($date as $key=>$value){
    echo( "$key : $value <br>\n");
}
?>