<?php 
/*
count() function returns the num of elements in an array
Syntax
count($arr);

Parameter Values
Parameter	Description
array	Required. Specifies the array
mode	Optional. Specifies the mode. Possible values:
0 - Default. Does not count all elements of multidimensional arrays
1 - Counts the array recursively (counts all the elements of multidimensional arrays)

Return Value:	Returns the number of elements in the array
*/

$cars = ["Volvo" , "BMW" , "Toyota"];
echo(count($cars) .  "<br>\n");

$cars = [
    "Volvo" => ["XC60" , "XC90"],
    "BMW" => ["x3" , "x5"] ,
    "Toyota" => ["HighLander"]
];
echo("Normal count : " . count($cars) . "<br>\n");
echo("Recursive count : " . count($cars , 1));
?>