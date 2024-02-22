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
//Example 1 
Echo("EXAMPLE 1 <BR>\n");

$age = ["Peter"=>"35" , "Ben"=>"37" , "Joe"=>"43"];

echo("keys changing  Default case(lower case) : ". "<br>\n");

print_r(array_change_key_case($age)); 

echo("\$numbers array keys changing to CASE_LOWER : ". "<br>\n");
print_r(array_change_key_case($age , CASE_UPPER));

//Example 2 
Echo("EXAMPLE 2 <BR>\n");

$numbers = ["h" => "Hello" ,"w" => "world" ,"t" => "Today is Beautiful"];

echo("\$numbers array keys changing to CASE_LOWER : ". "<br>\n");
print_r(array_change_key_case($numbers , CASE_LOWER));

echo("\$numbers array keys changing to CASE_UPPER : ". "<br>\n");
print_r(array_change_key_case($numbers , CASE_UPPER));
?>