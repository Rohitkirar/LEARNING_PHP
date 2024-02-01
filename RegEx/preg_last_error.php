<?php 
/*
* The preg_last_error() function returns an error code for the most recently evaluated regular expression. The returned value will match one of the following constants:
* Return Values => Returns one of the following constants (explained on their own page):
=> PREG_NO_ERROR
=> PREG_INTERNAL_ERROR
=> PREG_BACKTRACK_LIMIT_ERROR (see also pcre.backtrack_limit)
=> PREG_RECURSION_LIMIT_ERROR (see also pcre.recursion_limit)
=> PREG_BAD_UTF8_ERROR
=> PREG_BAD_UTF8_OFFSET_ERROR
=> PREG_JIT_STACKLIMIT_ERROR
Syntax
preg_last_error()
Return Value:	Returns an error code for the most recently evaluated regular expression
*/

ECHO "ExAMPLE 1 : ";
$str = 'The regular expression is invalid';
$pattern = '/invalid//';
$match = preg_match($pattern , $str , $matches);

if($match == false){
    //an error occured
    $err = preg_last_error();
    if($err == PREG_INTERNAL_ERROR){
        echo 'Invalid regular expression.';
    }
}
else if($match){
    //a match was found
    echo $matches[0] ;

}
else{
    //No matches were found
    echo 'No matches found';
}

echo "<br>\n";
Echo "EXAMPLE 2 : <BR>\n";

preg_match ('/(?:\D+|<\d+>)*[!?]/' , 'foobar foobar foobar');

if(preg_last_error() == PREG_BACKTRACK_LIMIT_ERROR){
    echo("Backtrack limit was exhausted");
}
?>