<?php 
//rsort() sort array in descending order ;

$cars = ["volvo" , "BMW" , "Toyota"];
print_r($cars);
rsort($cars);
print_r($cars);

$numbers = [32,35,1, 563,232,124, "str" , 2.2432 ,  574, 1123 ,12, 1] ;
rsort($numbers);
print_r($numbers);

$city = ["gj" => "Ahemdabaad" , "mp" =>"Bhopal" , "cg" => "Raipur" , "mh" => "Mumbai" , "rj" => "Jaipur"];
print_r($city);
rsort($city);
print_r($city);

?>