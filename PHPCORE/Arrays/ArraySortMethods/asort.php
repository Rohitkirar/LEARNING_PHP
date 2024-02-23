<?php 
//asort() sorts an associative array in ascending order according to its value;

$age = ["peter" => 23 , "Ben" => "37"  , "Joe" => 43];

print_r($age);
asort($age);
print_r($age);

// sorting indexed array
$numbers = [34, 2, 6,12 ,63 ,12, 335] ;
asort($numbers);
print_r($numbers);

$city = [ "mp" => "Bhopal" , "gj" => "Ahemdabaad" ,   "pj" => "Haryana" ,"cg" => "Raipur" , "rj" => "Jaipur"  ];
print_r($city);
asort($city);
print_r($city);

?>