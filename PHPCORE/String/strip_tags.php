<?php 
/*
strip_tags() -> this removes the html, xhtml ,xml tags from the string 
*/
$str = "<p>MY name is <h1>Arab</h1> <\p>";
$stripstr = strip_tags($str);

echo(strip_tags($stripstr));

echo("<br>\n");

echo(strip_tags("<div>this is a div tag<\div>"));
?>