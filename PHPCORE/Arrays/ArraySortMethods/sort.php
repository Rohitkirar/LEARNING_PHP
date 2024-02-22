<?php 
//THe element in an array can be sorted in alphabetical or numerical order, descending or ascending
//sort()  sort arrays in ascending order
$cars = ["Volvo" , "BMW" , "Toyota"];
print_r($cars);

sort($cars);

print_r($cars);

$numbers = [44, 32,66, 12 ,775, 121, 421, 1] ;
sort($numbers);
print_r($numbers);

//Note it removes the keys and sort the array as per values

$city = [ "mp" => "Bhopal" , "up" => "Lucknow" , "mh" => "Mumbai" , "cg" => "Raipur" , "Gj" => "Ahemdabaad" ];
print_r($city);
sort($city);
print_r($city);
?>