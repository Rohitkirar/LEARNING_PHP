<?php 
/*
array_change_key_case() function changes all keys in an array to lowercase or uppercase
syntax : array_change_key_case(array, case)
Parameter	Description
array	Required. Specifies the array to use
case	Optional. Possible values:
CASE_LOWER - Default value. Changes the keys to lowercase
CASE_UPPER - Changes the keys to uppercase

Return Value:	Returns an array with its keys in lowercase or uppercase, or FALSE if array is not an array
*/

$age = ["Peter"=>"35" , "Ben"=>"37" , "Joe"=>"43"];
print_r(array_change_key_case($age , CASE_UPPER));

$numbers = ["h" => "Hello" ,"w" => "world" ,"t" => "Today is Beautiful"];

print_r(array_change_key_case($numbers , CASE_LOWER));
print_r(array_change_key_case($numbers , CASE_UPPER));

print_r($numbers);
?>