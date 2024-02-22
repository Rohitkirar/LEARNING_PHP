<?php 
/*
The array_filter() function filters the values of an array using a callback function
Syntax
array_filter(array, callbackfunction, flag)

Return Value:	Returns the filtered array
*/

//EXAMPLE ! : finding animal name greater having length greater than 3
function stringLength($value){
    if(strlen($value)>3)
        return $value;
}
$animals = [
    "cat" ,"dog" , "rabbit" , "Elephant" , "Lion" , "Tiger" , "dear" 
];
$resultarray = array_filter($animals , "stringLength"  );

foreach($resultarray as $value){
    echo("$value / ");
}
echo("<br>\n");

?>