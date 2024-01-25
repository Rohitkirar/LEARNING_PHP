<?php 
/*
Task 2 : vowel count
*/
$str = "hello how are you";
$str = strtolower($str);

$vcount  = substr_count($str , "a");
$vcount += substr_count($str , "e");
$vcount += substr_count($str , "i");
$vcount += substr_count($str , "o");
$vcount += substr_count($str , "u");
echo("The number of vowels in string($str)  is : " .$vcount);
?>