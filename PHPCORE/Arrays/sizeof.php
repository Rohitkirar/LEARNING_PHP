<?php 
/*
sizeof() function returns the number of elements in an array.
The sizeof() function is an alias of the count() function;
Syntax
sizeof(array, mode)

Parameter	Description
array	Required. Specifies the array
mode	Optional. Specifies the mode. Possible values:
0 - Default. Does not count all elements of multidimensional arrays
1 - Counts the array recursively (counts all the elements of multidimensional arrays)
Return Value:	Returns the number of elements in the array
*/

$cars = ["Volvo" , "BMW" , "Toyota" ];
echo(sizeof($cars)  ."<br>\n");


$cars = [
    "Volvo" => ["XC60" , "XC90"],
    "BMW"  => ["X3" , "X5"],
    "Toyota"=>["Highlander"]
];
echo("Normal Count : " . sizeof($cars)."<br>\n" );
echo("Recursive count : " . sizeof($cars ,1));
?>