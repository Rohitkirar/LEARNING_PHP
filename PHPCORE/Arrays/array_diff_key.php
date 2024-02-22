<?php 
/*
array_diff_key() function compares the keys of two or more arrays and returns the differece
Syntax
array_diff_key(array1, array2, array3, ...)

Return Value:	Returns an array containing the entries from array1 that are not present in any of the other arrays
*/

$a1 = ["a"=>"red" , "b"=>"green" , "c"=>"blue"];
$a2 = ["a"=>"red" , "c"=>"blue" , "d"=>"pink"];

$result = array_diff_key($a1 , $a2);
print_r($result);

$a3 = ["red" , "green" , "blue" , "yellow"];
$a4 = ["red" , "green" , "blue" ];

$result1 = array_diff_key($a3 , $a4);
print_r($result1);

$a5 = ["a" => "red" , "b" =>"green" , "c" => "blue"];
$a6 = ["c" => "yellow" , "d"=>"black" , "e" => "brown"];
$a7 = ["f" => "green" , "c"=> "purple" , "g"=> "red"];
$result2 = array_diff_key($a5 , $a6, $a7);
print_r($result2);
?>