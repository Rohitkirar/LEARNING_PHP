<?php 
/*
passing arg by reference : In PHP, arguments are usually passed by value, which means that a copy of the value is used in the function and the variable that was passed into the function cannot be changed.
When a function argument is passed by reference, changes to the argument also change the variable that was passed in. 
To turn a function argument into a reference, the & operator is used:
*/

function add_five(&$value){ 
    $value += 5;
}
$num = 2 ;
add_five($num);
echo($num);

?>