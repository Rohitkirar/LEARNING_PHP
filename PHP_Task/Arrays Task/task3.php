<?php 
//Q3. From the array $words = ["apple", "banana", "orange", "kiwi", "grape"], create a new array where each word is replaced by its reverse, and then sort the resulting array alphabetically.

$words = ["apple" , "banana" , "orange" , "kiwi" , "grape"];

$resultarray = array_map("reverseFunction" , $words);

sort($resultarray);

foreach($resultarray as $value){
    echo $value . " ";
}


function reverseFunction($value){
    return strrev($value);
}
?>