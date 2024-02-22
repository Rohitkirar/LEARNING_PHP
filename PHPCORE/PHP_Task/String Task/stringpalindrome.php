<?php 
/* 
Task 4 : string palindrome check
*/
$str = "hooh";

//method 1 

$x = strcmp($str , strrev($str));
if($x==0)
    echo("Palindrome string");
else
    echo("NOT a Palindrome string");
echo("<br>\n");

//method 2

$strrev = strrev($str);
if($str === $strrev)
    echo("Palindrome string");
else
    echo("NOT a Palindrome string");

echo("<BR>\n");

//method 3 
echo "EXAMPLe 3 : <br>\n";

$str = "a";

for($i=0 , $j=strlen($str)-1 ; $i<strlen($str) ; $i++ , $j--){

    if($i>$j || strlen($str)==1){
        echo "PALINDROME STRING";
        break;
    }
    if($str[$i] != $str[$j]){
        echo "NOT A PALINDROME!";
        break;
    }
    }

?>