<?php 

//implode("separator" , $str) : this function join array element to generate string

//implode function

echo("Regenerating string from array using implode function : ");

echo("<br>\n");

$res = implode(" " , $strarr);

echo($res);

echo("<br>\n");

// join function

echo(join(" -> " , $strarr));
?>