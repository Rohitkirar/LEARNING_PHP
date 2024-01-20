<?php

/*
Sometimes we have to change one variable to other or we have to fixed a variable data type so this  can we done with the help of casting.
Change Data Type
Casting can done with this statements
(int)      : convert to integer data type
(string)   : convert to string data type
(float)    : convert to float data type
(boolean)  : convert to boolean data type
(array)    : convert to array data type
(object)   : convert to object data type 
(unset)    : convert to NULL data type
*/

// casting to Integer data type

$a = "5053 adfndf";
$b = 404.232380;
$c = 7023;
$d = array(4574,"349" , 488, true, 49.234);
$e = true;

var_dump((int)$a);
var_dump((int)$b);
var_dump((int)$c);
var_dump((int)$d);
var_dump((int)$e);
?>
