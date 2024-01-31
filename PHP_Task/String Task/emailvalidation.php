<?php
/* 
Task 1 : Email validation 
constrant to be check
1) only starting with alphabet letter not with numbers
2) ending with .in or .com only
3) contain @ 
*/
$str = "arun34@gmail.com";

if(str_contains($str , "@") && (str_contains($str , ".in") || str_contains($str , ".com")))
    echo("valid email");
else
    echo("invalid email");
?>