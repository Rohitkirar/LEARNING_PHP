<?php 
//task 7 to calculate factorial of a num using for loop

$number = 4;

$factorial = 1 ;
for($x=1 ; $x<=$number ; $x++){
    $factorial *= $x;
}
echo("The factorial of $number is : " . $factorial);



?>