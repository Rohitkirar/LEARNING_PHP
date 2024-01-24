<?php 
/*
The strtok() function splits a string into smaller strings (tokens). + keep tracking of tokens
Syntax : strtok(string,split)

Parameter	Description
string	Required. Specifies the string to split
split	Required. Specifies one or more split characters
*/ 

$str1 = "Hello World. Beautiful morning";

$token1 = strtok($str1, " ");

while($token1 !== false){
    echo($token1 . "<br>\n");
    $token1 = strtok(" ");
}

echo("<br>\n");

$str2 = "All set to go brother";
$token2 = strtok($str2, " ");

while($token2 !== false){
    echo($token2 . "<br>\n");
    $token2 = strtok(" ");
}
?>