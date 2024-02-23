<?php 
//getLine() function returns the line number where the exception occured and caught.

try{
    echo strlen("hello" , "world") ;
}
catch(ArgumentCountError $e){
    echo $e->getMessage() . "<br>" ;
    echo $e->getLine() . "<br>" ;
    echo $e->getCode() . "<BR>" ;
}
?>