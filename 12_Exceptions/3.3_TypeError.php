<?php 
//TypeError exception occur when we perform arthimetic operation between two different datatypes

$operand1 = [23,43,12,534, "string" ,412,343];
$operand2 = [3, 4 , 7 , 34 , 0 , 41 , 43];
$result ;
try{
    for($i=0 ; $i<count($operand1) ; $i++){
        if(!is_int($operand1[$i]) || !is_int($operand2[$i]))
            throw new TypeError("cannot perform arthimetic operation between two different datatypes<br>");
        $result[$i] = $operand1[$i] + $operand2[$i] ; 
        echo $result[$i] . " ";
    }
}
catch(TypeError $e){
    echo $e->getMessage() ;

    print_r($result);
}
?>