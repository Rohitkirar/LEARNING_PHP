<?php 
/* 
generate random password without using rand function using given string of some particular characters 
    ex : "jkdhhd3$Dasdasa@@@#_DASD938" => answer : D@saa@ 
*/
$str = 'jkdhhd3$Dasdasa@@@#_DASD938' ;

$shuffled = str_shuffle($str);

echo(substr($shuffled, 0, 6));
?>