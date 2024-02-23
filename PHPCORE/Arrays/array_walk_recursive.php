<?php 
/*
array_walk_recursive() fn runs each array element in a user defined fn. The array's keys and values are parameters inn the function.The diff b/w this fn and the array_walk() fn is that with this fn you can work with deeper arrays
Syntax
array_walk_recursive(array, myfunction, parameter...)
Return Value:	Returns TRUE on success or FALSE on failure
*/

function myfunction($val , $key){
    echo("the key $key has the the value $val" ."<br>\n");
}
$a1 = ["a" => "red" , "b"=>"green"];
$a2 = [$a1 , "1"=>"blue" , "2" => "yellow"];
array_walk_recursive($a2, "myfunction");

?>