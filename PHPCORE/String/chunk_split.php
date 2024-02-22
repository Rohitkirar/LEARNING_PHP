<?php 
/*
chunk_split(string , length(optional) , end(optional) ); 
this fun break a string into chunk as per the length given and put end parameter as pass
*/

$str = "Hello World!";
echo chunk_split($str , 1 , "-");

echo("<br>\n");

echo(chunk_split($str , 6 , "..."));

echo("<br>\n");

echo(chunk_split($str ,2 ));


// $arr = chunk_split("Hello World",6," >>>");
// var_dump($arr);
?>