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

// $obj = new stdClass();
// $obj->name = "Rohit Kirar";
// $obj->city = "Sanchi";
// $obj->contact = 39439;
// var_dump($obj);
?>