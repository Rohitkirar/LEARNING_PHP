<?php 
/*
String datatype
string is a squence of character like " HELLO WORLD" ;
string is surrounded by double quotes "double quotes string" or single quotes 'single quote string' both
double qoute allows special character while single quote doesn't allow special charater

String function 
strlen() : it return the length of string
str_word_count() : it counts the number of words in a string 
strrev() : it reverse the string;
strpos() : to search in string /  it return the first occurance index of search idx and if not found it returns false;
str_replace("oldstr" , "newstr" , $variable) : it is used to replace in string 
str_repeat($variable , num) : used to generate the number  of times the same string
strtoupper(); return string in upper case 
strtolower(); return string in lower case
strtrim() ; remove white space from starting and ending of the string
explode(" " , $str) ; to convert the string into array, separator is required 
*/

// $str1 = "hello world $fj";
$str2 = 'single quote string $dkfjsj';
echo($str2);
?>