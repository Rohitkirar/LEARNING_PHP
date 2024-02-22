<?php 

// md5() generates the hash code for the given string

$str = "Hello World";
echo md5($str);

echo("<br>\n");

$str = "Hello";
echo "The string: ".$str."<br>";

echo("<br>\n");

echo "TRUE - Raw 16 character binary format: ".md5($str, TRUE);

echo("<br>\n");

echo "FALSE - 32 character hex number: ".md5($str);

?>