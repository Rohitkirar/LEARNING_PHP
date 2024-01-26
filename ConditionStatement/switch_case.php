<?php 
/*
switch statement is used to perform different actions based on different conditions
switch statement to select one of many blocks of code to be executed

The break keyword breaks out of the switch block

The default code block is executed if there is no match
*/

$favcolor = "saffron";

switch($favcolor){
    case "red" :
        echo("Your favorite color is red!");
        break;
    case "blue" : 
        echo("your favourite color is blue");
        break;
    case "green" :
        echo("your favourite color is green");
        break;
    case "saffron" : 
        echo("your favorite color is saffron");
        break;
    default : 
        echo "your favorite color is not mentioned here";
}
?>