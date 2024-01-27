<?php 
/*
Create Array 
you can create arrays by using the array() function
you can also use a shorter syntax by using the [] brackets
Delete : to delete an array item use for single item : unset(arr[0]); or for multiple item : unset(arr[0] , arr[1] , arr[5]);
*/
$cars = array("volvo" , "bmw" , "toyota");
print_r($cars);

$cities = ["Mumbai" , "Ahmedabaad" , "RajKot" , "Bhopal" , "Indore" , "Vadodara" ];
print_r($cities);

$bikes = [
    "R15" ,
    "RS200" , 
    "Bullet350"
];
print_r($bikes);

// array keys

$city = [
    "Gujart" => ["Ahemdabaad" , "Rajkot" , "Gandhinagar"],
    "MP" => ["Bhopal" , "Indore" , "Vidisha" , "Sanchi"]
];
print_r($city);
echo($city['MP'][3] . "<br>\n");

//declare empty array
$arr = [] ;
$arr[0] = "Hello";
$arr["w"] = "World";
$arr[3] = "everyone";
print_r($arr);


//Excecute a Function Item : Array items can be of any data type, including function. To execute such a function, use the index number followed by parentheses ()

function myFunction() {
    echo"Hello world";
    return "I come from a function!";
}
  
$myArr = array("Volvo", 15, "myFunction");
  
var_dump($myArr[2]());
?>