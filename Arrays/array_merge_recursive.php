<?php 
/*
array_merge_recursive() function merges one or more arrays into one array
The difference between this function and the array_merge() function is when two or more array elements have the same key. Instead of override the keys, the array_merge_recursive() function makes the value as an array.
Note: If you assign only one array to the array_merge_recursive() function, it will behave exactly the same as the array_merge() function.
Syntax
array_merge_recursive(array1, array2, array3, ...)
*/

$a1 = ["a"=>"red" , "b"=>"green"];
$a2 = ["c"=>"blue" , "b"=>"yellow"];
print_r(array_merge_recursive($a1 , $a2));
?>