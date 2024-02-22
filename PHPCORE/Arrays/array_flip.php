<?php 
/*
array_flip() function flips exchanges all keys with their associated values in an array;
Syntax
array_flip(array)
*/
$a1 = ["a" => "red" , "b" => "green" , "c" => "blue" , "d" => "yellow"];
$result = array_flip($a1);
print_r($result);

$a2 = [1,343, 65,3,23,7543,123,9];
print_r(array_flip($a2));

?>