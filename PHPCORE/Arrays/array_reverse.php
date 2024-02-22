<?php 
/*
array_reverse() function returns an array in the reverse order;
Syntax
array_reverse(array, preserve)

Parameter	Description
array-Required. Specifies an array
preserve-Optional. Specifies if the function should preserve the keys of the array or not. Possible values:
true
false
Return Value:	Returns the reversed array
*/
$a = ["Volvo" , "XC90" , ["BMW" , "Toyota"]];
$reverse = array_reverse($a);
$preserve = array_reverse($a , true);

print_r($a);
print_r($reverse);
print_r($preserve);
?>