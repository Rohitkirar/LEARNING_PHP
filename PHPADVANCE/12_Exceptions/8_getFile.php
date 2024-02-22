<?php 
//getFile() returns the full directory in which file the exception occurs
try{
    strlen();
}
catch(ArgumentCountError $e){
    echo $e->getMessage() . "<br>";
    echo $e->getFile() . "<br>"; 
}
?>