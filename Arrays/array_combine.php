<?php 
/*
array_combine() function creates an array by using the elements from one keys array and one values array

Note : Both arrays mush have equal number of elements;

Syntax : array_combine(array $keys, array $values): array
*/

$fname = ["Peter" , "Ben" , "Joe"] ;
$age = [35 , 37, 43];

$c = array_combine($fname , $age);
print_r($c);

print_r(array_combine(array("A" , "B" ,"C") , array(65,66,67)));

?>