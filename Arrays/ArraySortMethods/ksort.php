<?php 
//ksort sorts an associative array in ascending order according to the key
$age = ["Peter" => 35 , "ben" => '37' , "Joe"=>"43" ];
print_r($age);
ksort($age);
print_r($age);

$numbers = [34 ,2 , 2343, 643, 22, 1, 67, 32];
ksort($numbers);
print_r($numbers);

$city = ["cj" => "Raipur" , "mp" => "Bhopal" , "up" => "Lucknow" , "mh" => "Mumbai" , "rj" => "Jaipur" ];
ksort($city);
print_r($city);

?>