<?php 
/*
array_pad() function inserts a specitifed number of elements with a specified value to an array

Tip : If you assign a negative size parameter the function will insert new elements Before the orignal elements

Note : This function will not delete any elements if the size parameter is less than the size of the original array

Syntax
array_pad(array, size, value)

Return Value:	Returns an array with new elements
*/
$a = ["red" , "green"];
print_r(array_pad($a , 5, "blue"));

$b = ["red" , "green"];
print_r(array_pad($b , -5 , "blue"));

//EXAMPLE

$numbers = [ 1, 2, 3];
$paddednumbers = array_pad($numbers , 5 , 0);

foreach($paddednumbers as $values){
    echo("$values ");
}
echo("<br>\n");
?>