<?php 
/*
global variable : the variable declared outside the function has global scope and can be accessed outside the function
To access global variable inside function we use global keyword
we can also used $GLOBALS[index] array to used global variabl. Index is name of varible
*/
$name = "ROHIT KIRAR" ;

echo $name;

echo("<br>\n");
//by using global keyword
function myname(){
    // echo($name); //it gives error undefined variable
    global $name ;
    echo $name ;
    echo("<br>\n");
}
myname();

//by using $GLOBALS[index] array

function printname(){
    echo $GLOBALS['name'];
    echo("<br>\n");
    $GLOBALS['name'] = "Aarab";
    echo($GLOBALS['name']);
}
printname();

echo("<br>\n");
echo("change global variabl : " . $name);
?>