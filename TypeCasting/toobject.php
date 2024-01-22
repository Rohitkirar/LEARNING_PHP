<?php 
//datatype changing into object using statement (object)$varname;
/*
When converting into objects, most data types converts into a object with one property,
named "scalar", with the corresponding value.

NULL values converts to an empty object.

Indexed arrays converts into objects with the index number as property name and the value as property value.
Associative arrays converts into objects with the keys as property names and values as property values.
*/
$a = 343 ; 
$b = "dfjfj" ;
$c = true ;
$d = false ;
$e = 59.3589;
$f = NULL;

var_dump((object)$a);
var_dump((object)$b);
var_dump((object)$c);
var_dump((object)$d);
var_dump((object)$e);
var_dump((object)$f);

$arr1 = array("Scorpio" ,  "Thar" , "Hyundai" , "swift" );
$arr2 = array("name"=>"cello" , "color" => "blue" , "type" => "dot");

print_r((object)$arr1);
print_r((object)$arr2);

?>
