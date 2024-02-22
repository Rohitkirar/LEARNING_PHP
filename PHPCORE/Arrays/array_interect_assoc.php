<?php 
/*
array_intersect_assoc() function compares the keys and values of two or more arrays and returns the matches.
Syntax
array_intersect_assoc(array1,array2,array3, ...)

Return Value:	Returns an array containing the entries from array1 that are present in all of the other arrays
*/
$a1 = ["a"=>"red" , "b"=>"green" , "c"=>"blue" , "d"=>"yellow"];
$a2 = ["a"=>"red" , "b"=>"green" , "g"=>"blue"];
$a3 = ["a"=>"red" , "b"=>"green" , "g"=>"blue"];

$result = array_intersect_assoc($a1 , $a2 , $a3);
print_r($result);
?>