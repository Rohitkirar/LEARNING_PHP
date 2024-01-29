<?php 
/*
range()  function creates an array containing a range of elements .
This function returns array of elements from low to high
Note: If the low parameter is higher than the high parameter, the range array will be from high to low.
range(low , high , step);

Parameter	Description
low	Required. Specifies the lowest value of the array
high	Required. Specifies the highest value of the array
step	Optional. Specifies the increment used in the range. Default is 1

Return Value:	Returns an array of elements from low to high
*/
$number = range(0,5);
print_r($number);

$number = range(0 , 50 , 10);
print_r($number);

$number = range(50 , 0 ,10);
print_r($number);

$letter = range("A", "D");
print_r($letter);
?>