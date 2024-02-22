<?php 
/*
array_diff() function compares the values of two or more arrays and returns the differences.

This function compares the values of two (or more) arrays, and return an array that contains the entries from array1 that are not present in array2 or array3, etc.

Syntax
array_diff(array1, array2, array3, ...)


Return Value:	Returns an array containing the entries from array1 that are not present in any of the other arrays
*/
$a1 = ["a" => "red","s"=>"saffron" , "b"=>"green" , "c"=>"blue" , "d"=>"yellow"];
$a2 = ["e" => "red" , "f"=>"green" , "g" =>"blue" ];

$result = array_diff($a1 , $a2);
print_r($result);

$a3 = ["a" => "red" , "b" => "black" , "h" => "yellow"];

$result = array_diff($a1 , $a2 , $a3);
print_r($result);
?>