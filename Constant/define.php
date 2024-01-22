<?php
/* 
Constants are like variables , except that once they are defined they cannot be changed or undefind;
A constant is an identifier(name) for a simple value. The value cannot be changed during the script
A valid constant name starts with a letter or underscore(no $ sign befor the constant name)
Note unlike variable, constants are automatically "global" across the entire script
define() function is used to define a constant
syntax : define(name , value );
case-insensitive is no longer supported
Constants are automatically global and can be used across the entire script.
*/
define("greeting" , "Welcome to the world of cheaters");
echo(greeting);

echo("<br>\n");

function defineConstant($name , $value){
    echo(greeting);
    echo("<br>\n");
    define($name , $value);
    echo(str);
}
defineConstant("str" , "defining constant through function");

echo("<br>\n");

echo(str);

echo("<br>\n");

//define constant array using define function
define("tech" , ["Java" , "c++" , "PHP" , "Laravel" , "javascript"]);
print_r(tech);
?>
