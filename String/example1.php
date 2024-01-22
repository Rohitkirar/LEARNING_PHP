<?php
//strlen(string) and str_word_count(string)   and substr_count(string , substring);

$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30";

$len =  strlen($str);
echo("the length of string is : " . $len );

echo("<br>\n");

//print each character of string
for($x=0 ; $x<$len ; $x++){
    echo("\"$str[$x]\"" . " ");
}

echo("<br>\n");

//find count of word
$count = str_word_count($str);
echo("the total words is : " . $count) ;

echo("<br>\n");

//substr_count(string , substring);
echo("substring count : " . substr_count("world is kind for those who are kind." , "kind") );

?>