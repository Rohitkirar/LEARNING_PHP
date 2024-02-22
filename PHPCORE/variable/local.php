<?php 
/*
the variable defined inside a function are known as local varible and only accessed in that functin only
Note we can create same name variable in different function
*/
function name(){
    $name = "rohit kirar";
    echo($name);
    echo("<br>\n");
}
name();
// echo($name); generating error undefined variable
function name1 (){
    $name = "arun Pratap";
    echo($name);
    echo("<br>\n");
}
name1();
?>