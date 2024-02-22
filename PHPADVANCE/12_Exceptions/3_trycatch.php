<?php 
/*
TRY...CATCH BLock in PHP
try catch block is used to handle an exception so that our program will not terminate.
syntax : 
try{
    //code that may generate an exception
}
catch{
    //handle an exception
}
*/

//Example 1 : prevour example that is divisble by zero
ECHO "EXAMPLE 1 : TRY...CATCH BLOCK : <br>" ;
function division($number1 , $number2){
    if($number2 ==0 )
        throw new Exception("Divisible by zero generate an exception !") ;
    return $number1 / $number2 ;
}

try{
    echo division(233 , 0 ) ; 
    // echo 233/0  ; 
}
catch(Exception $e){
    echo "unable to divide a number by 0 <BR> " ; 
    echo "unable to divide a number by 0 <BR> " ; 
    
    //write code here to execute ;
}

// Example 2 : we can write try catch block inside catch block again and again;

ECHO "<br>EXAMPLE 2 : we can write try catch block inside catch block again and again : <br>" ;
try{
    echo division(233 , 0 ) ; 
    // echo 233/0  ; 
}
catch(Exception $e){
    echo "Outter catch block error divide a number by 0 <BR> " ; 

    try{
        echo division(233 , 0 ) ; 
        // echo 233/0  ; 
    }
    catch(Exception $e){
        echo "inside catch error unable to divide a number by 0 <BR> " ; 
    }
}

// Example 3 : trying to write only try block
echo "<br>Example 3 : unable to write only try block. It is mandatory to write one block either catch or finally with try block otherwise it generate the error  : <BR>" ;

try{
    echo division(332,34);
}
finally{
    echo "<br>process completed: <br>" ;
}
?>