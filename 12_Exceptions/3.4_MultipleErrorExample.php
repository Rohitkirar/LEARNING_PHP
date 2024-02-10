<?php 
try{
    echo strlen("hello" , 4);
}
catch(ArgumentCountError $e ){
    echo $e->getMessage() . "<br>";
}

function division($operand1 , $operand2){
    return $operand1 / $operand2 ; 
}
$operandarr1 = [112, 4234 , 54, 123, 45, 36 , 3424  , 342 ];
$operandarr2 = [423, 34, 2, "string" , 3432 , 0 , 2 ] ;

for($i=1 ; $i < count($operandarr1) ; $i++){
    echo "<hr>ITERATION $i <br>" ;
    $operand1 = $operandarr1[$i] ; 
    if($i < count($operandarr2)){
        $operand2 = $operandarr2[$i] ;
    } 
    try{
        if(!$operand2){
            throw new DivisionByZeroError("number not divisible by zero<br>") ;
        }
        if(!is_int($operand1) || !is_int($operand2)){
            throw new InvalidArgumentException("Invalid type of argument pass<br>") ;
        }
        echo division($operand1,$operand2) . "<br>" ;
    }
    catch(DivisionByZeroError $e){
        echo $e->getMessage() ;
    }
    catch(TypeError $e){
        echo $e->getMessage() ;
    }
    catch(ArgumentCountError $e){
        echo $e->getMessage() ; 
    }
    catch(InvalidArgumentException $e){
        echo $e->getMessage();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    $operand1 = null ;
    $operand2 = null;
}
?>