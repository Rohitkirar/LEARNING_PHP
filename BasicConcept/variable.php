<?php

//Variable are container that store values. variable starts with $ sign followed by name of the variable

echo "Rules to define variable in php : \n" . 
     "varible start with $ sign followed by name of variable\n" . 
    "variable name with letter or underscore only i.e. alphanumeric\n" . 
    "variable name cannot start with number \n" . 
    "variable name are case sensitive both a and A are different variable \n"
    ;

echo "\n" ;

//Integer datatype
$x = 45 ; 
$y = 50 ;
$z = 45 + 50 ;
echo $z ;
echo "\n";

echo "\n" ;

//float datatype
$a = 45.3 ;
$b = 54.7;
echo $a+$b ;
echo "\n";

echo "\n";

//String datatype
$str = "String_variable";
echo $str . " " . $x;
echo "\n";


echo $x . " " . $str;
echo "\n" ;

echo "\n";

//boolean datatype
$bool1 = true;
$bool2 = false;
echo $bool1 ;
echo "\n";
echo var_dump($bool2) ;

echo "<br>\n";

echo "The scope of variable is part of script where the variable is used/reference \n" . 
    "Php has there different variable scopes \n"  . 
    "1) global 2) local 3) static \n" . 
    "global : the variable declared outside the function have global reference and can we excess from anywhere \n" . 
    "local : the variable declared inside function or scope then it can be excessable with that function after the function is execute the local variable are deleted \n"  .
    "static : the variable declared with static keyword are not deleted after execution of function, it can excessable after that also \n" . 
    "global keyword is used to access the global varaible inside a function \n" .
    "php store all global variable in an array GLOBAL[index] ; so to access it inside a function with out using global keyword we can use global array parse the name of variable as an index\n" 
    ;

//local varaible 
function myname(){
    $name = "Thanos" ;
    echo $name . "\n";
}
myname();
// echo $name; this line generating error as undefined varaible;

//global variable
$name = "ROHIT KIRAR" ;
echo $name . "\n" ;
function myname1(){
    global $name ;
    echo $name . "\n";
}
myname1();

function cars(){
    $car_name = "Scorpio" ; 
    echo  $car_name . "\n" ;
}
cars();
// echo cars($car_name) . "\n" ;
?>