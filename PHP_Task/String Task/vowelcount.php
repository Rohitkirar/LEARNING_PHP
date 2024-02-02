<?php 
/*
Task 2 : vowel count
*/

Echo "EXAMPLE 1 : <br>\n";

$str = "hello how are you";
$str = strtolower($str);

$vcount  = substr_count($str , "a");
$vcount += substr_count($str , "e");
$vcount += substr_count($str , "i");
$vcount += substr_count($str , "o");
$vcount += substr_count($str , "u");
echo("The number of vowels in string($str)  is : " .$vcount);

echo("<br>\n");

$vowel = ['a' , 'e' , 'i' , 'o' , 'u'];


$str = "How Are yOu";
$count = 0;

foreach($vowel as $value)
    $count += substr_count(strtolower($str) , $value );

echo "The vowel count is :  " . $count , "<br>\n";
?>