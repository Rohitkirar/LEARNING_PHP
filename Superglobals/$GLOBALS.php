<?php 
/*
Global variables are variables that can be accessed from any scope.
Variables of the outer most scope are automatically global variables, and can be used by any scope, e.g. inside a function.
To use a global variable inside a function you have to either define them as global with the global keyword, or refer to them by using the $GLOBALS syntax.
*/


//EXAMPLE 1 

ECHO "EXAMPLE 1 : " , "<br>\n";
$x = 75 ;
function myfunction(){
    echo "Value of x using GLOBALS array : " ,  $GLOBALS['x'] ;
}

myfunction();

Echo("<br>\n");

// Example 2 

echo("EXAMPLE 2: <BR>\n");
$y = 12;
function my_function(){
    // echo $y;  //it will generate error

    global $y;
    echo "Value of y using global keyword : " , "$y";
}

my_function();

Echo "<br>\n";

//EXAMPLE 3 

Echo "EXAMPLE 3 : <BR>\n";
// we also define global variable inside function

function createGlobal(){
    $GLOBALS['z'] = 100;

    global $z;
    echo "accessing variable z inside function : " , $z  , " <br>\n";
}

createGlobal();

echo "Accessing variabe z outside function using GLOBALS array : " , $GLOBALS['z'] , " <BR>\n";

echo "Accessing variable z outside function with name : " , $z , " <br>\n" ;  



?>