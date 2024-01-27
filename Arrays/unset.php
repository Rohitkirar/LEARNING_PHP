<?php 
/*
The unset() function is used to delete the array element and will not rearrange the indexes;
*/
$cars = ["Volvo" , "BMW" , "Toyota"];
unset($cars[0] , $cars[1]);

print_r($cars);

$city = ["gj" => "Ahemdabaad" , "mp" => "Bhopal" ,   "rj" => "jaipur"];
unset($city['rj']);
print_r($city);


?>