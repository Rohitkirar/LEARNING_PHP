<?php 
/*
array_fill() function fills an array with values;
Syntax
array_fill(index, number, value)
Parameter Values
Parameter	Description
index-Required.The first index of the returned array
number-Required.Specifies the numberof elements to insert
value-Required.Specifies the value to use for filling the array
Return Value:	Returns the filled array
*/

$a1 = array_fill(3, 4 , "blue");
print_r($a1);

print_r(array_fill(0, 5 , "apple"));
?>