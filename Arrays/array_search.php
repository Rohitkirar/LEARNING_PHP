<?php 
/*
The array_search() function search an array for a value and returns the key;
SYNTAX 
array_search(value, array, strict(true,false))

*/
$a = ["a"=>"red" , "b"=>"green" , "c"=>"blue"];
echo(array_search("red" , $a) . "<br>\n");

echo(array_search("blue" , $a ) . "<br>\n");

$b = ["a"=>"5" , "b"=>5 , "c"=>"5"];
echo(array_search(5 , $b , true) . "<br>\n");
echo(array_search("5" , $b , true) . "<br>\n");

?>