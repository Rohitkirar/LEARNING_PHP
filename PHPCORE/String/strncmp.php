<?php 
/*
The strncmp() function compares two strings.
Note: The strncmp() is binary-safe and case-sensitive.
Tip: This function is similar to the strcmp() function, except that strcmp() does not have the length parameter.
Syntax
strncmp(string1,string2,length) // case sensitive
Parameter Values
Parameter	Description
string1	Required. Specifies the first string to compare
string2	Required. Specifies the second string to compare
length	Required. Specify the number of characters from each string to be used in the comparison //imp line 
*/

echo(strncmp("Hello World!" , "Hello Earth!" , 6));

echo("<br>\n");

echo(strncmp("Hello" , "Hello" , 5));
echo("<br>\n");
echo(strncmp("Hello World!" , "hello world!" , 6));

?>