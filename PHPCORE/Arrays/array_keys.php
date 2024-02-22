<?php 
/*
array_keys() function returns an array containing the keys
Syntax
array_keys(array, value, strict)
Parameter	Description
array-Required. Specifies an array
value-Optional. You can specify a value, then only the keys with this value are returned
strict-Optional. Used with the value parameter. Possible values:
true - Returns the keys with the specified value, depending on type: the number 5 is not the same as the string "5".
false - Default value. Not depending on type, the number 5 is the same as the string "5".
Return Value:	Returns an array containing the keys
*/
$a = ["Volvo"=>"XC90" , "BMW"=>"X5" , "Toyota"=>"Highlander"];

print_r(array_keys($a));

$a1 = ["Volvo"=>"XC90" , "BMW"=>"X5" , "Toyota"=>"Highlander"];

print_r(array_keys($a , "Highlander"));

$a2 = [10 , 20 , 30 , "10"];

print_r(array_keys($a2 , "10" , false));
print_r(array_keys($a2 , "10" , true));
?>