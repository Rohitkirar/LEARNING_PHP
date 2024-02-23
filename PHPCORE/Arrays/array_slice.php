<?php 
/*
array_slice() function returns selected parts of an array
Note: If the array have string keys, the returned array will always preserve the keys (See example 4).
Syntax
array_slice(array, start, length, preserve)
*/
$a = ["red" , "green" , "blue" ,"yellow"  , "brown"];
print_r(array_slice($a , 2));


$b = ["red" , "green" , "blue" , "yellow" , "brown"];
print_r(array_slice($b , 1 , 2));

$c = ["red" , "green"  , "blue" , "yellow"  ,"brown"];
print_r(array_slice($c , 1, 2 , true));

$d = ["a"=>"red" , "b"=>"green" , "c"=>"blue" , "d"=>"yellow" , "e"=>"brown"];
print_r(array_slice($d, 1, 3));

$e = ["0"=>"red" , "1"=>"green" , "2"=>"blue" , "3"=>"yellow" , "4"=>"brown"];
print_r(array_slice($e , 1 , 2));

// EXAMPLE 

$employeedetails = [
    "Ben" , 40 , "Calfornia" ,
    "Ash" , 20 , "Planttown" ,
    "Tyson", 16 , "Coulombia",
    "Kai" , 23 , "New York"
];

for($i=0 ; $i<count($employeedetails) ; $i+=3){

    $resultarray = array_slice($employeedetails , $i , 3);

    for($j=0 ; $j<count($resultarray) ; $j++){

        echo($resultarray[$j] . " ");
        
    }
    echo("<br>\n");
}

?>