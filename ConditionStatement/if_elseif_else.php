<?php 
//if elseif else statement - executes different codes for more than two conditions

$t = 15 ; 
if($t==6 || $t==12){
    echo("good Morning");
}
elseif($t==12 || $t==15){
    echo("good afternoon");
}
else if($t==16 || $t==20){
    echo("Good evening");
}
else {
    echo("Good night");
}
?>