<?php 
/*
usort() function sorts an array by values using a user -defined comparison function
Syntax
usort(array, callback)
Parameter	Description
array	Required. Specifies the array to sort
callback	Required. A comparison function. Must return an integer <, =, or > than 0 if the first argument is <, =, or > than the second argument

Return Value:	Always returns TRUE
*/
function my_sort ($a , $b){
    if($a == $b)
        return 0 ;
    return ($a<$b) ? -1 : 1;
}
$a = [4, 2 ,8, 6];
usort($a , "my_sort");
print_r($a);
?>