<?php 
/*
Indexed Arrays
in indexed arrays each item has an index number
By default, the first item has index 0 , the second item has item 1 etc.

*/
$cars = array("Volvo" , "BMW" , "Toyota");
var_dump($cars);

echo($cars[0]);
$cars[1] = "Ford";
var_dump($cars);

foreach($cars as $x){
    echo("$x ");
}
echo("<br>\n");


//array_push() to add a new item
array_push($cars , "BMW");
var_dump($cars);
?>