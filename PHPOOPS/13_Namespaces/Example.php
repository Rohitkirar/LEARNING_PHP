<?php 
require_once('Example1.php') ;
require_once('Example2.php') ;

$exp1 = new A\Main();
$exp1->print();

echo "<hr>" ;
$exp2 = new B\Main();
$exp2->print();

echo "<HR>";

A\printa();
B\printa();

?>