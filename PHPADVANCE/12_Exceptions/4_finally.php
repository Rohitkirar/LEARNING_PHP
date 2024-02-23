<?php 
/* 
The try...catch...finally Statement
The try...catch...finally statement can be used to catch exceptions. Code in the finally block will always run regardless of whether an exception was caught. If finally is present, the catch block is optional.
Syntax
try {
  code that can throw exceptions
} catch(Exception $e) {
  code that runs when an exception is caught
} finally {
  code that always runs regardless of whether an exception was caught
}
*/

ECHO "EXAMPLE 1 : <br>"; 

$array1 = [324 , 5432 , 887 , 3425, 12];
$array2 = [2 , 3 , 0 , 5 , 6] ;
$resarray = [] ;
try{
    for($i = 0 ; $i<count($array1) ; $i++){
        $resarray[$i] = division($array1[$i] , $array2[$i]) ;
    }
}
catch(Exception $e){
    // echo $e . "<BR>"; 
    echo "Divisble by zero exception : <BR><BR>";
}
finally{
    echo "<BR>RESULT array : <BR>";
    print_r($resarray) ;
    echo "Process completed Succefully" ; 
}

function division($number1 , $number2){
    if($number2 == 0){
        throw new Exception("Divisble by zero error occur") ;
    }
    return $number1/$number2 ; 
}

?>