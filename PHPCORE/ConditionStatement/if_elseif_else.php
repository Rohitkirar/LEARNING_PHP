<?php 
//if elseif else statement - executes different codes for more than two conditions

$t = 15 ; 
if($t==6 || $t==12){
    echo("good Morning");
}
else if($t==12 || $t==15){
    echo("good afternoon");
}
else if($t==16 || $t==20){
    echo("Good evening");
}
else {
    echo("Good night");
}

echo "<br>\n";

//EXAMPLE 2

ECHO "EXAMPLE 2 : <BR>\n";

echo calculator(15 , '+' , 34) . "\n<br>\n";

function calculator($number1 , $operator , $number){
    if($operator=='+')
        return $number1 + $number;
    elseif($operator=='-')
        return $number1 - $number;
    elseif($operator=='*')
        return $number1 * $number;
    elseif($operator=='/')
        return $number1 / $number;
    elseif($operator=='%')
        return $number1 % $number;
    else
        return "Invalid arguments passed";
}
?>