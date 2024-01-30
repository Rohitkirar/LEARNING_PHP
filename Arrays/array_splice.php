<?php 
/*
array_splice() function removes selected elements from an array and replaces it with new element.The function also return an array with the removed elements
Tip: If the function does not remove any elements (length=0), the replaced array will be inserted from the position of the start parameter (See Example 2).
Syntax
array_splice(array, start, length, array)
*/

$a1 = ["a"=>"red" , "b"=>"green" , "c"=>"blue" , "d"=>"yellow"];
$a2 = ["a"=>"purple" , "b"=>"orange"];
array_splice($a1 , 0 , 2 , $a2);
print_r($a1);

$a1 = ["a"=>"red" , "b"=>"green" , "c"=>"blue" , "d"=>"yellow"];
$a2 = ["a"=>"purple" , "b"=>"orange"];
print_r(array_splice($a1 , 0 ,2 , $a2));
print_r($a1);

$a1 = array("0"=>"red" , "1" =>"green");
$a2 = array("0"=>"purple" , "1"=>"orange");
print_r(array_splice($a1 , 1 , 0 , $a2));
print_r($a1);

//EXAMPLE

$employeedetails = [
    "Ben" , 40 , "Calfornia" ,
    "Ash" , 20 , "Planttown" ,
    "Tyson", 16 , "Coulombia",
    "Kai" , 23 , "New York"
];

//remove old employee and replace by new one
$newemployee = ["Oak" , 60 , "Argentina"];

array_splice($employeedetails , 0 , 3 , $newemployee);

$count = 1;
for($x=0 ; $x<count($employeedetails) ; $x++){

    echo($employeedetails[$x] . " ");

    if($count%3==0)
        echo("<br>\n");
    $count++;
}

?>