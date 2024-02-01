<?php 
/*
* preg_match() function returns whether a match was found in a string.
* Syntax
    preg_match(pattern, input, matches, flags, offset)
* Return Value:	Returns 1 if a match was found, 0 if no matches were found and false if an error occurred
*/
Echo "EXAMPLE 1 : <Br>\n";

$str = "Welcome to W3schools";
$pattern = "/w3schools/i";
preg_match($pattern , $str , $matches , PREG_OFFSET_CAPTURE );

print_r($matches);

echo "<br>\n";

Echo "EXAMPLE 2  : <br>\n";

$txt = "Welcome to W3schools" ;
$pattern = "/[0-9]/i" ;

echo preg_match($pattern , $txt , $matcharray , PREG_OFFSET_CAPTURE);

print_r($matcharray);

Echo "<BR>\n";

//Grouping => You can use parentheses ( ) to apply quantifiers to entire patterns. They also can be used to select parts of the pattern to be used as a match. and curly brace to given the number of times it is repeated
ECHO "EXAMPLE 3 : <br>\n ";
$str = "Apples and bananas";
$pattern = "/ba(na){2}/i";

echo preg_match($pattern , $str) ;

?>