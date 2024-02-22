<?php 
/*
* preg_filter() function returns a string or array of strings in which matches of the pattern have been replaced with the replacement string.
* If the input is an array, this function returns an array. If the input is a string then this function returns a string.
* Syntax
preg_filter(pattern, replacement, input, limit, count)
* Return Value:	Returns an array of replaced strings if the input was an array, a string with replacements made if the input was a string or null if the input was a string and no matches were found

*/
$input = [
    "It is 5 o'clock" , 
    "40 days" , 
    "No numbers here" ,
    "In the year 2000"
];
$pattern = '/[0-9]+/';
$result = preg_filter($pattern , '($0)' , $input);

print_r($result);

ECHO "EXAMPLE 2 : <br>\n";
$txt = "Good morning everyone 10 time";
echo preg_filter($pattern , '($0)' , $txt) . "<br>\n";
echo preg_replace($pattern , '($0)' , $txt);

echo "<BR>\n";

//Example 3 comparing preg_filter vs preg replace
ECHO "EXAMPLE 3 : <BR>\n";
$subject = ['1' , 'a' , '2' , 'b' , '3' , 'A' , 'B' , '4' ];
$pattern = ['/\d/' , '/[a-z]/' , '/[1a]/'];
$replace = ['A:$0' , 'B:$0' , 'C:$0'];

echo  "preg_filter returns <br>\n";
print_r(preg_filter($pattern , $replace , $subject));

echo "preg_replace returns <br>\n";
print_r(preg_replace($pattern , $replace , $subject));

//Example 4  replaceing . with backslash using filter

ECHO "EXAMPLE 4 : <BR>\n";
$txt = "Good Morning. Everyone. 10 Time.";
$pattern = ['/\./' , '/[A-Z]/'];
$replace = ['/' , '@'];
print_r(preg_filter($pattern , $replace , $txt));
?>