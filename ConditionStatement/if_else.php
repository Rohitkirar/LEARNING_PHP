<?php 
//if else statement - execute some code if a condition is true and another code if that condition is false

Echo "EXAMPLE 1 : Age verifying for voting System <br>\n" ;

$age = 16;

if($age >= 18){
    echo "You are elgible to vote!" , "<br>\n";
}
else {
    echo "You are not eligible for vote! " , "<Br>\n";
}

ECHO "EXAMPLE 2 : Calculator using if and else Only : <BR>\n";

echo  Calculator(78 , '+' , 54);
function Calculator($number1 , $operator , $number2){
    if($operator != '+' || $operator != '-' || $operator != '*' || $operator != '/' || $operator != '%'){
        if($operator == '+' )
         return $number1 + $number2 ;
        if($operator == '-' )
         return $number1 - $number2 ;
        if($operator == '*' )
         return $number1 * $number2 ;
        if($operator == '/' )
         return $number1 / $number2 ;
        if($operator == '%' )
         return $number1 % $number2 ;
        else{
            Echo "invalid inputs";
        }
    }
    else{
        Echo "Invalid operator" ;
    }
}

Echo "<br>\n";

Echo "Example 3 : <br>\n";

$t = 10 ; 
if($t > 20) {
    echo("good day");
}
else{
    echo("good night");
}
?>