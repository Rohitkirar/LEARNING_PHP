<?php 
/*
CallBack Function or callback are function which passes as argument in another function 

An existing function is use as callback function just pass the name of function in form of string as an argument in another function.

We can pass callback function in userdefined as well as builtin function

*/
function stringLength($str){
    return strlen($str);
}

echo "EXAMPLE 1 : <br>" ;

$arr  = ["Apple" , "Banana" , "Orange" , "Watermelon" , "Grapes"];

print_r(array_map("stringLength" , $arr));


Echo "EXAMPLE 2: <BR>" ; 

$arr1  = ["fruit1" => "Apple" , "fruit2" => "Banana" , "fruit3" => "Orange" , "fruit4" => "Watermelon" , "fruit5" => "Grapes"];

print_r(array_map("stringLength" , $arr1));

?>