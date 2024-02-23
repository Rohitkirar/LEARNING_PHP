<?php 
/*
This function replaces the values of the first arr with the values from following arrays recursively.

array_replace_recursive(arr1 , arr2 ,...)
*/

$a1 = ["a" =>[ "red" ] , "b"=>["green" ,"blue"]];
$a2 = ["a"=>["yellow"] , "b"=>["black"]];

print_r(array_replace_recursive($a1 , $a2));

$b1 = ["a"=>["red"] , "b"=>["green" , "blue"]];
$b2 = ["a"=>["yellow"] , "b"=>["black"]];
$b3 = ["a"=>["orange"] , "b"=>["burgundy"]];

print_r(array_replace_recursive($b1 , $b2 , $b3));

$c1 = ["a"=>["red"] , "b"=>["green" , "blue"]];
$c2 = ["a"=>["yellow"] , "b"=>["black"]];

print_r(array_replace_recursive(array_replace_recursive($c1 , $c2)));

print_r(array_replace($c1 , $c2));


?>