<?php 
//Q2. Starting with the array $data = [8, 15, 3, 7, 10, 5], create a new array that contains the square of each number, filter out the numbers less than 50, and then calculate the sum of the remaining values.

$data = [8 , 15 , 3 , 7 , 10 , 5];

$squarearray = array_map("squareCalculation" ,$data);

$filteredarray = array_filter($squarearray , "filterFunction");

$sum = array_sum($filteredarray);

echo "The total sum of remaining values is : " , $sum ; 

function squareCalculation($value){
    return $value**2;
}

function filterFunction($value){
    if($value > 50)
        return $value;
}
?>