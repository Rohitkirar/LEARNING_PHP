<?php 
/*
array_diff_assoc() function compares the keys and values of two (or more) arrays and returns the differences.

Syntax
array_diff_assoc(array1,array2,array3...)

Return Value:	Returns an array containing the entries from array1 that are not present in any of the other arrays
*/
$a1 = ["a" => "red" , "b" => "green" , "c" => "blue" , "d" =>"yellow"];
$a2 = ["a"=>"red" , "b"=>"green" , "c"=>"blue"];

$result = array_diff_assoc($a1 , $a2);
print_r($result);

$a3 = ["a"=>"red" , "b"=>"green" ,"c"=>"blue" , "d"=>"yellow"];
$a4 = ["e"=>"red" , "f"=>"green" , "g"=>"blue"];

$result1 = array_diff_assoc($a3 , $a4);
print_r($result1);

$a5 = ["a"=>"red" , "b"=>"green" , "c"=>"blue" , "d"=>"yellow"];
$a6 = ["a"=>"red" , "f"=>"green" , "g"=>"blue"];
$a7 = ["h"=>"red" , "b"=>"green" , "g"=>"blue"];

$result2 = array_diff_assoc($a5 , $a6 , $a7);
print_r($result2);
?>