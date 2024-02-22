<?php 

//  str_word_count(string) : to count the no of word in string

$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30";

//find count of word

$count = str_word_count($str);
echo("the total words is : " . $count) ;

echo("<br>\n");
?>