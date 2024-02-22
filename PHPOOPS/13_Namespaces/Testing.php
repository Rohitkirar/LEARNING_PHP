<?php 
require 'Main.php';

use Namespaces\Main;


//first way

$table = new Main();
$table->message();


//second way (best way)

$table1 = new Main();
$table1->message();

// we also excess the function that is declare in namespace

Namespaces\greet();

// we also call the variable declare in namespaces;

echo "Hello, " .$name ;

?>