<?php 
// we can throw custom exception by using inheritence to create an custom exception

class NumberLessThanZero extends Exception{
    function errorMessage(){
        return $this->getMessage();
    }
}
$value = -40  ;

try{

    if($value < 0){
        throw new NumberLessThanZero("Erro : Number is less than zero");
    }
    else if($value === 0 ){
        throw new DivisionByZeroError("Error : Number should not be zero");
    }
    echo $value . "<br>" ;

}
catch(NumberLessThanZero $e){
    echo "catch 1 : " . $e->errorMessage() . "<br>"; 
}
catch(DivisionByZeroError $e){
    echo "catch 2 : " . $e->getMessage() . "<br>";
}
catch(Exception $e){
    echo "catch 3 : " . $e->getMessage() . "<br>";
}

?>