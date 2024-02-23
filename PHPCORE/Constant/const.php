<?php
/*
const vs define()
const are always case-sensitve || define() has a case-insensitive option
const cannot be created inside another block scope, like inside a function an  if statement ||
define can be created inside another block scope
Constants are automatically global and can be used across the entire script.
*/
const car = "BMW";
echo(car);

echo("<br>\n");

//generating error as const variable not declare inside any scope
// function constFun(){
//     const car2 = "AUDI";
//     echo(car2);
// }

const cararr = array("BMW" , "AUDI"  , "Thar" , "Nexon" );
print_r(cararr);

echo("<br>\n");


echo("<br>\n");
?>