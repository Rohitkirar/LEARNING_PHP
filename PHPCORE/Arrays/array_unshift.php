<?php 
/*
array_unshift() function inserts new elements to an array. the new array values will be inserted in the beginning of array
Tip: You can add one value, or as many as you like.

Note: Numeric keys will start at 0 and increase by 1. String keys will remain the same.
Syntax
array_unshift(array, value1, value2, value3, ...)


Return Value:	Returns the new number of elements in the array
*/
$a =["a"=>"red" , "b"=>"green"];
array_unshift($a , "blue");
print_r($a);

$a = ["a" => "red" , "b"=>"green"];
print_r(array_unshift($a ,"blue"));
print_r($a);

$a = [0=>"red" , 1=>"green"];
array_unshift($a , "blue");
print_r($a);
?>