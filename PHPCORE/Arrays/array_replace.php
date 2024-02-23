<?php 
/*
array_replace() function replaces the values of the first array with the values from following array
array_replace(array1, array2, array3, ...)
*/
$a1 = ["red" , "green" , "yellow" , "Blue"] ;
$a2 = ["blue" , "yellow"] ;
print_r(array_replace($a1 , $a2));

print_r($a1);

$b1 = ["a"=>"red" , "b"=>"green"];
$b2 = ["a"=>"orange" , "burgundy"];

print_r(array_replace($b1 , $b2));

$c1 = ["a"=>"red" , "green"];
$c2 = ["a"=>"orange" , "b"=>"burgundy"];

print_r(array_replace($c1 , $c2));

$d1 = ["red" , "green"] ;
$d2 = ["blue" , "yellow" , "skyblue"] ;
$d3 = ["orange" , "burgundy"] ;

print_r(array_replace($d1 , $d2 , $d3));

$e1 = ["red" , "green" , "blue" , "yellow"];
$e2 = [0=>"orange" , 3=>"burgundy"];

print_r(array_replace($e1 , $e2));

?>