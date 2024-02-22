<?php 
/*
array_reduce() function sends the values in an array to a user deined function and returns a string.
Note: If the array is empty and initial is not passed, this function returns NULL.
SYNTAX
array_reduce(array, myfunction, initial)

Return Value:	Returns the resulting value in string


Parameter	Description
array	Required. Specifies an array
myfunction	Required. Specifies the name of the function
initial	Optional. Specifies the initial value to send to the function
*/
function myfunction($v1, $v2){
    return "$v1 -> $v2" ;
}
$arr = ["Hello" , "World" , "Good" , "Morning"];
print_r(array_reduce($arr , "myfunction", ));

echo("<br>\n");

$a = ["Dog" , "Cat" , "Horse" , "Cow" , "Tiger"];

print_r(array_reduce($a , "myfunction" , "Hii"));

echo ("<br>\n");
function sumfunction($a1 , $a2){
    return ($a1+$a2);
}
$b = [10 , 15, 20] ;
print_r(array_reduce($b , "sumfunction" , 5));
?>