<?php 
//php array operators are used to compare arrays
$arr1 = array("a" => 1 , "b" => 2 , "c" => 3 , "d" =>  4 , "e" => 5 , "f" => 6);
$arr2 = array(5 ,6 , 7 , 8 , 9 , 10);

// ( + ) Union  of two array
print_r($arr1 + $arr2);

$x = array("a" => "red" , "b" => "green");
$y = array("c" => "blue" , "d" => "yellow");

print_r($x+$y);

// ( == ) Equality return true if $x and $y have same key/value
$x = array("a" => "red" , "b" => "green");
$y = array("b" => "green" , "a" => "red");
var_dump($x==$y);

// ( === )Identity returns true if $x and $y have same key/value pairs in the same order and of the same types
$x = array("a" => "red" , "b" => "green");
$y = array("b" => "green" , "a" => "red");
var_dump($x===$y);

//(!= , <> ) Inequality returns true if $x is not equal to $y
$x = array("a" => "red" , "b" => "green");
$y = array("b" => "green" , "a" => "red");
var_dump($x!=$y);
var_dump($x<>$y);

// ( !== ) Non-identity return true if $x is not identical to $y
$x = array("a" => "red" , "b" => "green");
$y = array("b" => "green" , "a" => "red");
var_dump($x!==$y);

?>