<?php 

//str_replace("word" , "replace" , stringvar) (case sensitive)  and 
// str_ireplace("word" , "replace" , stringvar) (case insensitive);

$str = "Don't judge a book by its cover";

$str = str_replace("book" , "man" , $str);

echo($str);

echo("<br>\n");

$str = str_replace("cover" , "look" , $str);

echo($str);

echo("<br>\n");


//str_ireplace("word" , "replace" , stringvar)
$str = "the day is thursday";
$str = str_ireplace("thursday" , "friday" , $str);

echo($str);
?>
