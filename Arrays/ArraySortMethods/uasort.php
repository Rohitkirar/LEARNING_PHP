<?php 
/*
uasort() function sorts an array by values using a user defined comparison function and maintains the index association
Syntax
uasort(array, callback)

Return Value:	Always returns TRUE
*/

function my_sort($a , $b){
    if($a == $b) return 0 ; 
    return ($a<$b) ? -1 : 1; 
}
$arr = ["a" => 4 , "b" => 2 , "c" => 8 , "d"=> 6];
uasort($arr,"my_sort");
print_r($arr);
?>