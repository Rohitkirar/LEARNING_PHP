<?php 
//decrement operators are used to decrement a variable's value;
$x = 10 ;
--$x; //pre decrement
echo($x . "<br>\n");
$x-- ; //post decrement
echo($x . "<br>\n");

while($x > 0 ){
    echo($x . " -> ");
    $x--;
}
?>