<?php 
echo "<pre>";
// DivisionByZeroError
$operand1 = [23,43,12,534,6,412,343];
$operand2 = [3, 4 , 7 , 34 , 0 , 41 , 43];
$resultarray = [] ;
try{
    
    for($i=0  ; $i<count($operand1) ; $i++){
        $resultarray[$i] = division($operand1[$i] , $operand2[$i]);
    }
    echo "<h2>program run successfully without any error</h2> <BR>";
    print_r($resultarray);
}
catch(DivisionByZeroError $e){
    echo "Error Caught : " . $e->getMessage();

    echo "<h2>printing output from catch block</h2> <br>" ;
    print_r($resultarray) ;
}

function division($operand1 , $operand2){
    if(!$operand2){
        throw new DivisionByZeroError("<h2>Number divisble by zero generates an error</h2><br>");
    }
    return $operand1/$operand2 ; 
}
echo "</pre>";
?>