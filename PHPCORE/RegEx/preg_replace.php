<?php 
/*
* preg_replace() function returns a string or array of strings where all matches of a pattern or list of patterns found in the input are replaced with substrings.
* Syntax
preg_replace(patterns, replacements, input, limit, count)
Parameter Values
Parameter	    Description
* patterns => Required. Contains a regular expression or array of regular expressions
* replacements => Required. A replacement string or an array of replacement strings
* input => Required. The string or array of strings in which replacements are being performed
* limit =>	Optional. Defaults to -1, meaning unlimited. Sets a limit to how many replacements can be done in each string
* count => Optional. After the function has executed, this variable will contain a number indicating how many replacements were performed

* Return Value:	Returns a string or an array of strings resulting from applying the replacements to the input string or strings
*/

Echo "EXAMPLE 1 : <br>\n";

$str = 'Visit Microsoft!';
$pattern = '/microsoft/i';

echo preg_replace($pattern , 'W3Schools' , $str) . "<br>\n";

ECHO "EXAMPLE 2 : <br>\n";

$txt = "Contains a regular expression or array of regular expression";
$pattern = "/regular/";
echo preg_replace($pattern , "#" , $txt);

?>