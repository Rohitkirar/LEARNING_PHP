<?php 
/*
array_push() function inserts one or more elements to the end of an array

Tip : you can add one value or as many as you like
Note : Even if your array has string keys your added elements will always have numeric keys
Syntax
array_push(array, value1, value2, ...)
Return Value:	Returns the new number of elements in the array
*/
$a = ["red" , "green"];
array_push($a , "blue" , "yellow");
print_r($a);

$b = ["a" => "red" , "b" => "green"];
array_push($b, "blue" , "yellow");
print_r($b);

$c = ["a" => "red" , "b" => "green"];
array_push($c, "blue" , "yellow");
print_r($c);
?>