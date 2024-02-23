<?php 
/* 
while loop executes a block of code as long as the specified condition is true;

Note : remember to increment $i, or else the loop will continue forever.
break : to break a loop
continue : stop current iteration and continue with the next;
*/
$i=1;
while($i < 6){
    echo($i . " ");
    $i++;
}
echo("<br>\n");
$i -= 5;
while($i<6){
    
    if($i== 4) break ;

    echo($i . " ");
    $i++;
}
echo("<br>\n");

$i = 0 ; 
while($i<6){
    $i++;
    if($i == 4) continue;
    echo($i . " ");
}
echo("<br>\n");

// Alternative Syntax : while loop can also be written with the endwhile statement like this
$i = 1 ; 
while($i<6):
    echo($i . " ");
    $i++;
endwhile;
echo("<br>\n");

//Example 1 : printing 1 to 100 number with difference 10 each

$i = 0 ; 
while($i < 100){
    $i += 10;
    echo($i . " ");
}
echo("<br>\n");

//Example 2 : Enter a number in range 1 to 10 only

$x = 0;
while($x == 0 ){
    $a = readline("enter a number 1 to 10 : ");
    if($a>=1 && $a<=10){
        echo("Valid number : $a" . "<br>\n");
        break;
    }
}
?>