<?php 
/*
Throwing an Exception in php 
throw keyword allows  a userdefined function  or method to throw an exception. When the exception is thrown the code following it will not be executed .

If an exception is not caught, a fatal error will occur with an "Uncaught Exception" message.
*/
//Lets try to throw an exception without catching it:

function divison($number1 , $number2){
    if($number2 == 0){
        throw new Exception("Division by zero generate an error" ) ;
    }
    return $number1/$number2;
}

echo divison(15,0);

?>