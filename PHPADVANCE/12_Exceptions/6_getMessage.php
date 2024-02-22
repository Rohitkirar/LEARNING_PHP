<?php 
//getMessage() returns the message why the exception occur if the message is set manual in object then it return it otherwise the default error Message occur
echo "EXample 1 : <br> " ;
$x = 12;
$y = 0 ;

try{
    echo $x/$y;
}
catch(DivisionByZeroError $e ){
    echo $e->getMessage() . "<br>";
}

echo "EXample 2 : <br> " ;

$x = 12;
$y = "string" ;

try{
    echo $x/$y;
}
catch(DivisionByZeroError $e ){
    echo $e->getMessage();
}
catch(TypeError $e ){
    echo $e->getMessage();
}
?>