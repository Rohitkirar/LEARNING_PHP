<?php 

$date = '08-10-2013';

$pattern = "/^(0[1-9]|[12]\d|3[01])-([0][1-9]|[1][0-2])-\d{4}$/";

if(preg_match_all($pattern , $date , $matcharray))
    echo("Match Found <br>\n");
else
    echo("Match Not found" . "<br>\n");

// print_r($matcharray);
?>