<?php 
// Task 8 Write a program which will give you all of the potential combinations of a two-digit decimal combination, printed in a comma delimited format : 00, 01, 02, 03, 04.  Use number 10

$number = 10 ;

for($i=0 ; $i<10 ; $i++){
    for($j=0 ; $j<10 ; $j++){
        echo($i . $j . " " );
    }
    echo("<br>\n");
}
?>