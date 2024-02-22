<?php 
/* 
str_split($str , len) use to split an string into array
*/
$str  =  "Hello World";
$arr = str_split($str);
print_r($arr);

$arr2 = str_split($str, 6);
print_r($arr2);
?>