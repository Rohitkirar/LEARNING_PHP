<?php 
//array() creates an array

//indexed array 

$cities = array("Bhopal" , "Jaipur" , "Indore" , "Bangalore" , "Ahamdabaad" , "Bombay" , "Lucknow" , "Mathura" , "Katra");

print_r($cities);

foreach($cities as $i){
    echo($i . " ");
}
echo("<br>\n");

//associate array
$age = array("ajay" => "32" , "rudra" => "45" , "jatin" => 11 );
foreach ($age as $x=>$y){
    echo("$x : $y" . "<br>\n");
}

// multidimensional array

$cars = array(
    array("Volvo" , 100 , 96),
    array("BMW" , 60 ,59) ,
    array("Toyota" , 110 , 100)
);
foreach($cars as $i){
    echo("$i[0] $i[1] $i[2]" . "<br>\n");
}
?>