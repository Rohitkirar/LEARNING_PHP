<?php 
/*
uksort() function sort an array by keys using a user defined comparison function
Syntax
uksort(array, callback)

Return Value:	Always returns TRUE
*/

function my_sort($a  , $b){
    if($a == $b) return 0 ; 
    return ($a < $b ) ? -1 : 1;
}
$arr = ["a" =>4 , "d"=>6 ,  "b"=>2, "c" =>8];
uksort($arr , "my_sort");
print_r($arr);

?>