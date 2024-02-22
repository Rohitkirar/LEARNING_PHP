<?php 
//arsort() sorts an associative array in descending order, according to value;

$age = ["peter" => 35 , "ben" => "37" , "Joe"=>43];
print_r($age);
arsort($age);
print_r($age);

$numbers = [232, 1, 43, 421, 3563, 12, 67 ,0 ];
arsort($numbers);
print_r($numbers);

$city = ["mp" =>"Bhopal" , "gj" => "Ahedabaad" , "rj" => "Jaipur" , "pj" => "Haryana"];
print_r($city);
arsort($city);
print_r($city);
?>