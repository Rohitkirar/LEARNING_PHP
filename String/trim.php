<?php

//trim($str) : it return a string by removing whitespace from both the end;
//trim($str , "substr")  : it return a string by removing the matching substr from both the end of the string

$str = "  Hello World  " ;

echo(trim($str));

echo("<br>\n");

$str = trim($str);
echo(trim($str , "Hed!"));

echo("<br>\n");

$x = "This is a string";
echo(trim($x ,"Thisstring"));

echo("<br>\n");

?>