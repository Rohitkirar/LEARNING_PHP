<?php 
/* 
An array is a special variable that can hold many values under a single name and you can access the values by referring to an index number or name

TYPE OF ARRAY
In PHP there are three types of arrays : 
*Indexed arrays - arrays with a numeric index
*Associative arrays - arrays with named keys
*Multidimensional arrays - arrays containing one or more arrays.

Array Items
Array items can be of any data type
The most common are strings and number but array items can also be objects, functions or even arrays

Array Functions
The real strength of PHP arrays are the built-in array functions, like the count() function for counting array items

*/
$myArr = array("Volvo" , 15 , ["apples" , "bananas"] , "myFunction");

$cars = array("Volvo" , "BMW" , "Toyota");
echo(count($cars));
?>