<?php 
// substr_count(string , substring); to count a particular substring in a string

$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30";

echo("\"is\"substring count : " . substr_count($str , " is") );

echo("<br>\n");

$x = substr_count($str , "having");

echo("having count in string   : " . $x);

?>