<?php
/*
What is a Regular Expression?
* A regular expression is a sequence of characters that forms a search pattern. When you search for data in a text, you can use this search pattern to describe what you are searching for.
* A regular expression can be a single character, or a more complicated pattern.
* Regular expressions can be used to perform all types of text search and text replace operations.
* Syntax In PHP, regular expressions are strings composed of delimiters, a pattern and optional modifiers.
    $exp = "/w3schools/i";
common delimiter are  / , # or ~.
* Function	        Description
=> preg_match()	    Returns 1 if the pattern was found in the string and 0 if not
=> preg_match_all()	Returns the number of times the pattern was found in the string, which may also be 0
=> preg_replace()	Returns a new string where matched patterns have been replaced with another string
Brackets are used to find a range of characters:

Expression	Description
[abc]	Find one character from the options between the brackets
[^abc]	Find any character NOT between the brackets
[0-9]	Find one character from the range 0 to 9
Metacharacters
Metacharacters are characters with a special meaning:

Metacharacter	Description
|	Find a match for any one of the patterns separated by | as in: cat|dog|fish
.	Find just one instance of any character
^	Finds a match as the beginning of a string as in: ^Hello
$	Finds a match at the end of the string as in: World$
\d	Find a digit
\s	Find a whitespace character
\b	Find a match at the beginning of a word like this: \bWORD, or at the end of a word like this: WORD\b
\uxxxx	Find the Unicode character specified by the hexadecimal number xxxx
Quantifier	Description
n+	Matches any string that contains at least one n
n*	Matches any string that contains zero or more occurrences of n
n?	Matches any string that contains zero or one occurrences of n
n{x}	Matches any string that contains a sequence of X n's
n{x,y}	Matches any string that contains a sequence of X to Y n's
n{x,}	Matches any string that contains a sequence of at least X n's
*/

Echo "EXAMPLE 1 : <br>\n";

$str = "Visit W3Schools";
$pattern = "/w3schools/i";

echo preg_match($pattern , $str);

echo "<br>\n";

Echo "EXAMPLE 2 : <br>\n";

$str = "The rain in SPAIN falls mainly on the plains.";
$patterns = "/ain/i";

echo preg_match_all($patterns , $str);

Echo "<br>\n";

Echo "EXAMPLE 3 : <br>\n";

$str = "Visit Microsoft!";
$pattern = "/microsoft/i";

echo preg_replace($pattern , "W3schools" , $str);
?>