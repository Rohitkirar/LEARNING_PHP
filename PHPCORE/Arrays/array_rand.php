<?php 
/*
array_rand() function returns a random key from an array or it returns an array of random keys if you specify that function should return more than one key
Syntax
array_rand(array, number)
Parameter	Description
array	Required. Specifies an array
number	Optional. Specifies how many random keys to return

Return Value:	Returns a random key from an array, or an array of random keys if you specify that the function should return more than one key
*/

$a = ["a" => "red" , "b"=>"green" , "c"=>"blue" , "d"=>"yellow"];
print_r(array_rand($a , 1)); //return an idx
echo("<br>\n");
print_r(array_rand($a , 2)); // return an array
?>