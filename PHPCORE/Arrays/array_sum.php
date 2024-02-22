<?php 
/* 
array_sum() function return the sum of all the values in the array
Syntax
array_sum(array)
*/

$a = [5 , 15 , 25];

echo(array_sum($a) . "<br>\n");

$a = ["a" =>52.2 , "b"=>13.5 ,"c"=>0.5];

echo(array_sum($a) . "<br>\n");

//EXAMPLE 2 : 
$marks = [87 , 56 , 90 , 43 , 75  ];

$percentage = array_sum($marks) / count($marks);

echo("Your Percentage is " . $percentage);

?>