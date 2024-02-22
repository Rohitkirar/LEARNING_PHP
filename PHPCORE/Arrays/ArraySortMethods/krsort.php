<?php 
//krsort() sorts an associative array in descending order, according to the key
$age = ["peter" => "35" , "ben" => "37" , "joe" => 43 ];
print_r($age);
krsort($age);
print_r($age);

$numbers = [34 ,22, 56, 1, 75, 3];
krsort($numbers);
print_r($numbers);
?>