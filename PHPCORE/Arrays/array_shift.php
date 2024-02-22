<?php 
/*
array_shift() function removes the first element from an array and returns the value of the removed element

Note: If the keys are numeric, all elements will get new keys, starting from 0 and increases by 1 (See example below).
Syntax
array_shift(array)
Return Value:	Returns the value of the removed element from an array, or NULL if the array is empty
*/
$a = ["a"=>"red" , "b"=>"green" ,"c"=>"blue"];
echo(array_shift($a)."<br>\n");
print_r($a);

$a = [0=>"red" , 1=>"green" , 2=>"blue"];
echo(array_shift($a));
print_r($a);
?>