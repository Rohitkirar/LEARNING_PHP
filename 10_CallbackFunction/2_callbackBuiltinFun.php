<?php 

//Example 1  
Echo "Example 1 : <BR> " ;

$arr = [223,12,54,23,756,1234,34,26,654] ;

usort($arr , "sortFunction");

print_r($arr);
function sortFunction($val1 , $val2){
    return $val1 <=> $val2;
}

//Example 2 
ECHO "EXAMPLE 2 :  <br>";

$arr1  = ["fruit1" => "Apple" , "fruit2" => "Banana" , "fruit3" => "Orange" , "fruit4" => "Watermelon" , "fruit5" => "Grapes"];

print_r(array_map(function ($data){ return strlen($data); } , $arr1));


?>