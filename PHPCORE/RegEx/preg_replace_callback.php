<?php 
/*
* The preg_replace_callback() function, given an expression and a callback, returns a string where all matches of the expression are replaced with the substring returned by the callback function.
* Syntax
preg_replace_callback(pattern, callback, input, limit, count)

* Return Value:	Returns a string or an array of strings resulting from applying the replacements to the input string or strings.
*/

Echo "Example 1 : <br>\n";

function countLetters($matches){
    return $matches[0] . '(' . strlen($matches[0]). ')' ;
}

$input = "Welcome to W3Schools.com!";
$pattern = '/[a-z0-9\.]+/i';
$result = preg_replace_callback($pattern , 'countLetters' , $input);

echo $result  ;

echo "<br>\n";

Echo "EXAMPLE 2 : <BR>\n" ;

$text = "April fools day is 04/01/2024";
$text .= "Last christmas was 12/25/2023";

function next_year($matches){
    return $matches[1].($matches[2]+1);
}
echo preg_replace_callback(
    "|(\d{2}/\d{2}/)(\d{4})|",
    "next_year",
    $text);

?>