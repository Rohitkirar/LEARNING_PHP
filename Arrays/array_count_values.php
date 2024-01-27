<?php 
/*
array_count_values() function counts all the values of an array

Returns an associative array, where the keys are the original array's values, and the values are the number of occurrences
*/
$a = ["A" , "Cat" , "Dog" , "A" , "Dog"];

print_r(array_count_values($a));

$arr = array_count_values($a);

print_r($arr);

?>