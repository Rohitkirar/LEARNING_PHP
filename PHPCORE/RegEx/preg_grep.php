<?php 
/*
* preg_grep() function returns an array containing only elements from the input that match the given pattern.
* Syntax
preg_grep(pattern, input, flags)
*Return Values ¶
Returns an array indexed using the keys from the array array, or false on failure.
*/
Echo "EXAMPLE 1 : <br>\n";

$input = ["Red" , "Pink" , "Green" , "Blue" , "Purple"];

$pattern = "/[pg]/i";

$result = preg_grep($pattern , $input);

print_r($result);

//EXAMPLE 2 
Echo "EXAMPLE 2 : <br>\n";

$input = ["Red" , "Pink" , "Green" , "Blue" , "Purple"];

$pattern = "/[pg]/i";

$result = preg_grep($pattern , $input , PREG_GREP_INVERT);

print_r($result);
?>