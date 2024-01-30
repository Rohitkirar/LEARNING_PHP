<?php 
/*
array_chunk() function splits an array into chunks of new array

Syntax
array_chunk(array, size, preserve_key)

Parameter Values
Parameter	Description
array	Required. Specifies the array to use
size	Required. An integer that specifies the size of each chunk
preserve_key	Optional. Possible values: 
true - Preserves the keys
false - Default. Reindexes the chunk numerically

Return Value:	Returns a multidimensional indexed array, starting with zero, with each dimension containing size elements
*/

$cars = ["Volvo" , "BMW" , "Toyota" , "Honda" , "Mercedes" , "Opel"];

$x = array_chunk($cars , 2);

print_r($cars);

print_r($x);
print_r($x[0]);
print_r($x[1]);
print_r($x[2]);

$age = [
    "peter"=>35 ,
    "ben" => 37 ,
    "joe" => 43 , 
    "harry"=>50 
];
print_r(array_chunk($age, 2 , true));

echo("<br>\n");

//EXAMPLE 2 

$employeedetails = [
    "Ben" , 40 , "Calfornia" ,
    "Ash" , 20 , "Planttown" ,
    "Tyson", 16 , "Coulombia",
    "Kai" , 23 , "New York"
];
$resultarray = array_chunk($employeedetails , 3 );

// print_r($resultarray);

for($i=0 ; $i < count($resultarray) ; $i++ ){
    for($j=0 ; $j < count($resultarray[$i]) ; $j++){
        echo($resultarray[$i][$j] ." ");
    }
    echo("<br>\n");
}

echo "<br>\n";
?>