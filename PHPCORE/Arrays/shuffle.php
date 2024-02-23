<?php 
/*
shuffle() fn randomizes the order of the elements in the array
Syntax
shuffle(array)

Return Value:	Returns TRUE on success or FALSE on failure
*/
$arr = ["a" => "red" , "b"=>"green" , "c"=>"blue" , "d"=>"yellow" , "e"=>"purple"];
shuffle($arr);
print_r($arr);
?>