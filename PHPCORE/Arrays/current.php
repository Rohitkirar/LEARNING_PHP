<?php 
/*
current() fn returns all the value fo the current elements in an array.
Every array has an internal pointer to its current element which is initialized to the first element inserted into array
Tip : This function does not move the arrays internal pointer;
Related methods:

end() - moves the internal pointer to, and outputs, the last element in the array
next() - moves the internal pointer to, and outputs, the next element in the array
prev() - moves the internal pointer to, and outputs, the previous element in the array
reset() - moves the internal pointer to the first element of the array
each()(removed from php) - returns the current element key and value, and moves the internal pointer forward
Syntax
current(array)

Return Value:	Returns the value of the current element in an array, or FALSE on empty elements or elements with no value
*/

$people = ["Peter" , "Joe" , "Glenn" , "CleveLand"];
echo(current($people) . "<br>\n");

echo( next($people) . "<br>\n");

echo(current($people) . "<br>\n");

echo(prev($people). "<br>\n");

echo(end($people) . "<br>\n");

echo(current($people) . "<br>\n");

echo(reset($people) . "<br>\n");

// print_r(each($people)); this fn is removed from php
?>