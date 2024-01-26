<?php 
//logical operator are used to combine conditional statement
$x = 10 ;
$y = 10 ;

// ( and , && )  AND operator
var_dump($x==10 and $y==10);
var_dump($x==10 && $y==10);

// ( or , || ) OR operator 
var_dump($x==10 or $y==2);
var_dump($x==10 || $y==2);

// ( xor ) XOR operator only true if either $x or $y is true but not both true
var_dump($x==10 xor $y == 23);
var_dump($x==10 xor $y == 10);

// ( ! ) NOT operator 
var_dump(!true);
var_dump(!false);

echo var_dump(5 and 4);
?>