<?php 
/*
array_combine() function creates an array by using the elements from one keys array and one values array

Note : Both arrays mush have equal number of elements;

Syntax : array_combine(array $keys, array $values): array
*/
//Example 1
ECHO("EXAMPLE 1 <BR>\n");
$fname = ["Peter" , "Ben" , "Joe"] ;
$age = [35 , 37, 43];

$combinedarray = array_combine($fname , $age);

foreach($combinedarray as $key => $value){
    echo("$key $value <br>\n");
}

echo("<br>\n");

//Example 2 
echo("EXAMPLE 2 : <BR>\n");
$newarray = array_combine(array("A" , "B" ,"C") , array(65,66,67));

foreach($newarray as $key => $value){
    echo("$key $value <br>\n");
}

// try with associative array 

?>