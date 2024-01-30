<?php 
/*
array_count_values() function counts all the values of an array

Returns an associative array, where the keys are the original array's values, and the values are the number of occurrences
*/
$a = ["A" , "Cat" , "Dog" , "A" , "Dog"];

print_r(array_count_values($a));

$arr = array_count_values($a);

print_r($arr);

// EXAMPLE 2 

ECHO("EXAMPLE 2 : <BR>\n");

$bonusrecord = ["Rohit" , "Sagar" , "Soham" ,"Sagar" ,  "sourab" , "Rohit" , "Sagar" , "Hritil" , "Rohit" , "Sagar"];

$nooftimes = array_count_values($bonusrecord);

foreach($nooftimes as $key => $value){

    echo("$key gets bonus $value times<br>\n");
    
}
?>