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

//EXAMPLE : Create an array, the starting index is 0 and  have 10 element  and store "hello world" as values

$array = array_fill(0 , 10 , "Hello World");

foreach($array as $value){

    echo($value ."<br>\n");

}

?>