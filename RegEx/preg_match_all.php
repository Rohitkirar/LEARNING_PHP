<?php 
/*
preg_match_all() fn returns the number of matches of a pattern that were found in a string and populates a variable with the matches that were found

* Syntax
preg_match_all(pattern, input, matcharray, flags, offset)
* Return Value:	Returns the number of matches found or false if an error occurred

Parameter	        Description
* pattern	Required. Contains a regular expression indicating what to search for
* $str	Required. The string in which the search will be performed
* matcharray	Optional. The variable used in this parameter will be populated with an array containing all of the matches that were found
* flags	Optional. A set of options that change how the matchesarray is structured.

One of the following structures may be selected:
* PREG_PATTERN_ORDER - Default. Each element in the matches array is an array of matches from the same grouping in the regular expression, with index 0 corresponding to matches of the whole expression and the remaining indices for subpattern matches.
* PREG_SET_ORDER - Each element in the matches array contains matches of all groupings for one of the found matches in the string.
Any number of the following options may be applied:
* PREG_OFFSET_CAPTURE - When this option is enabled, each match, instead of being a string, will be an array where the first element is a substring containing the match and the second element is the position of the first character of the substring in the input.
* PREG_UNMATCHED_AS_NULL - When this option is enabled, unmatched subpatterns will be returned as NULL instead of as an empty string.
* offset	Optional. Defaults to 0. Indicates how far into the string to begin searching. The preg_match() function will not find matches that occur before the position given in this parameter
*/
Echo "Example 1 : <br>\n";

$str = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/ain/i";

if(preg_match_all($pattern , $str , $matchesarray)){
    print_r($matchesarray);
}

Echo "Example 2 : /[co]/  <br>\n"; 

$txt = "W3schools.com";
$pattern = "/[co]/i";

echo preg_match_all($pattern , $txt) . "<br>\n";

preg_match_all($pattern , $txt , $matchesarray);

print_r($matchesarray);

//to check the occurence of character in string we use replace

echo preg_replace($pattern , "#" , $txt) ."<br>\n" ;

ECHO "EXAMPLE 2 : /[^eo]/ <br>\n"; 

$text = "Welcome" ;
$pattern = "/[^eo]/i";

echo preg_match_all($pattern , $text) . "<br>\n";

echo preg_replace($pattern , "#" , $text) . "<br>\n";

preg_match_all($pattern , $text , $matcharray );

print_r($matcharray);


?>