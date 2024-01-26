<?php 
//php conditional assign op are used to set a value depending on condition
$x ;
var_dump(empty($x));

// ( ? )  : ternary return value of Returns the value of $x. The value of $x is expr2 if expr1 = TRUE.The value of $x is expr3 if expr1 = FALSE
//Syntax : $x = expr1 ? expr2 : expr3

var_dump(empty($x) ? "EMPTY" : "NOT EMPTY") ;

$x = empty($x) ? "EMPTY" : "NOT EMPTY" ;
echo($x . "<br>\n");

//( ?? ) Null Coalescing 

echo $user = $_GET["user"] ?? "user not exist";

echo "<br>\n";

echo $color = $color ?? "red";

?>