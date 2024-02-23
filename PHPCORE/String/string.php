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
trim() ; remove white space from starting and ending of the string
explode(" " , $str) ; to convert the string into array, separator is required 
substr($var ,  idx , len/num) : to slice str it return the string from the idx to upto the length given or number of character wants;
substr($var , idx ) : to slice the string from idx to end ;
*/

// $str1 = "hello world $fj";
$str2 = 'single quote string $dkfjsj';
echo($str2);

$str = "php is a server side scripting language";

echo "<br>" . "\n";
echo($str);

echo "<br>" . "\n";
echo("strlen() function using : " . strlen($str));

echo "<br>" . "\n";
echo("str_word_count() function used : " . str_word_count($str));

echo "<br>" . "\n" ;

echo(strrev($str));

echo "<br>\n" ;
echo("searching 'is' in str : " . strpos( $str , "is"));

echo "<br>\n";
echo(str_replace("php" , "PHP: Hypertext Preprocessor" , $str));
echo "<br>\n" ;
echo ($str);
$str = str_replace("php" , "PHP: Hypertext Preprocessor" , $str);
echo"<br>\n";
echo($str);
echo"<br>\n";
echo(str_repeat($str,5));
echo "<br>\n";

echo("Upper case string : " . strtoupper($str));

echo "<br>\n";
echo("Lower case string : " . strtolower($str));

echo "<br>\n";
echo(trim("    welcome to my youtube channerl    "));

echo ("<br>\n");
var_dump(explode(" " , $str));

echo("<br>\n");

// string concatenation

$str1 = "Hello";
$str2 = "World";
echo "$str1 $str2";
echo("<br>\n");
echo($str1 . " " . $str2);

echo("<br>\n");


//string slicing 
// substr($var ,  idx , len/num) : to slice str it return the string from the idx to upto the length given or number of character wants;
// substr($var , idx ) : to slice the string from idx to end ;
// we can negative index also to slice the str -1 idx is for the last character;

echo (substr($str, 5 , 22));
echo("<br>\n");
echo(substr($str, 5 ));
echo("<br>\n");
echo(substr($str , -22 , 13));
echo(substr($str , -22 , 13));

echo("<br>\n");
//escape character
// to insert character that are not allowed to add in a string use backslash (\) to enter in it
# some useful escape character : \$ , \n , \r (carriage return - to break and start in new line) , \" , \' and many more;
echo("this is a \$ \"doller\" symbol");

?>