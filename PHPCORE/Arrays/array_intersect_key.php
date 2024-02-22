<?php 
/*
array_interect_key() function compares the keys of two or more arrays and returns the matches;
Syntax
array_intersect_key(array1, array2, array3, ...)
Return Value:	Returns an array containing the entries from array1 that are present in all of the other arrays
*/
$a1 = ["a"=>"red" , "b"=>"green" ,"c"=>"blue"];
$a2 = ["a"=>"red" , "c"=>"blue" , "d"=>"pink"];

$result = array_intersect_key($a1 , $a2);
print_r($result);

$a3 = ["a"=>"red" , "b"=>"green" , "c"=>"blue"];
$a4 = ["c"=>"yellow" , "d"=>"black" , "e"=>"brown"];
$a5 = ["f"=>"green" ,"c"=>"purple" , "g"=>"red"];
$result1 = array_intersect_key($a3 ,  $a4 , $a5);
print_r($result1);
?>