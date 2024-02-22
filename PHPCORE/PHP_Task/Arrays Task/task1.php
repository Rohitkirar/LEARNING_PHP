<?php 
//Q1. From the array $prices = [25.5, 30.8, 18.2, 22.1, 15.9], find the average of the prices after excluding the two highest values.
$prices = [25.5 , 30.8 , 18.2 , 22.1 , 15.9 ];

sort($prices);

$prices = array_slice($prices , 0 , count($prices)-2);

$sum = array_sum($prices);

$average = $sum/count($prices);

echo "The average of Prices after excluding 2 highest values is $average";
?>