<?php 
/*
array_intersect() function compares the values of two or more arrays and returns the matches.
Syntax
array_intersect(array1, array2, array3, ...)
Return Value:	Returns an array containing the entries from array1 that are present in all of the other arrays
*/

$a1 = ["a" => "red" , "b" => "green" , "c" => "blue" , "d" => "yellow"];
$a2 = ["e" => "red" , "f"=>"green" , "g" => "blue"];
$result = array_intersect($a1 , $a2);
print_r($result);

$a3 = ["a" => "red" , "b"=>"green" , "c" =>"blue" , "d" => "yellow"];
$a4 = ["e" => "red" , "f" => "black" , "g" => "purple"];
$a5 = ["a" => "red" , "b" => "black" , "h" => "yellow"];

$result1 = array_intersect($a3 , $a4 , $a5);
print_r($result1);

//EXAMPLE 
$movies = [
    "fighter" => "2024" , 
    "Main hoon Atal" => "2024" , 
    "Tiger3" => "2023",
    "Pushpa" => "2022" , 
    "Jailer" => "2023"
];
$year = ["2024" , "2022"];

$resultarray = array_intersect($movies , $year);
print_r($resultarray);

?>