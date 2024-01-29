<?php 
/*
array_walk function runs each array element in a user defined fn. The array's keys and values are parameter in the function
Note: You can change an array element's value in the user-defined function by specifying the first parameter as a reference: &$value (See Example 2).
Tip: To work with deeper arrays (an array inside an array), use the array_walk_recursive() function.

Syntax
array_walk(array, myfunction, parameter...)


Return Value:	Returns TRUE on success or FALSE on failure
*/

function myfunction($value , $key){
    echo("The key $key has the value $value<br>\n");
}
$a = ["a"=>"red" , "b"=>"green" , "c"=>"blue"];
array_walk($a , "myfunction");

function myfun($value , $key , $p){
    echo("$key $p $value"."<br>\n");
}
$a = ["a"=>"red" , "b"=>"green" , "c"=>"blue"];
array_walk($a , "myfun" , "has the value");

//we can update the array by passing ref of arr

function updateArr (&$val , $key ){
    $val= "yellow";
}
$a = ["a"=>"red" , "b"=>"green" ,"c"=>"blue"];
array_walk($a , "updateArr");
print_r($a)

?>