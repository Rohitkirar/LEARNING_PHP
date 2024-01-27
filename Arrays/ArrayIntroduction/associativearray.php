<?php 
/*
Assoiative arrays are arrays that use named keys that you assign to them
To access an array item you can refer to the key name
*/
$car = array("brand"=>"Ford" , "model"=>"Mustang" ,  "year" =>3332);
print_r($car);

echo($car["model"] . "<br>\n");

$car["year"] = 2024;

//loop through the array
foreach($car as $x=>$y){
    echo "$x : $y <br>\n";
}

?>