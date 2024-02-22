<?php 
/*
array_values() function return all the values of an array(not keys);
Tip: The returned array will have numeric keys, starting at 0 and increase by 1.
Syntax
array_values(array)
*/
$a = ["name"=>"peter" , "age"=>"41" , "country" =>"USA"];
print_r(array_values($a));
?>