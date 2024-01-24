<?php 
/* 
The wordwrap() function wraps a string into new lines when it reaches a specific length.
Note: This function may leave white spaces at the beginning of a line.

Syntax : wordwrap(string , width(optional) , break(optional) , cut(optional));

string -> Required. Specifies the string to break up into lines
width -> Optional. Specifies the maximum line width. Default is 75
break -> Optional. Specifies the characters to use as break. Default is "\n"
cut   -> Optional. Specifies whether words longer than the specified width should be wrapped:
FALSE - Default. No-wrap
TRUE - Wrap
*/

$str = "An example of long word is : Superphysicologicatical";

echo(wordwrap($str , 10 , "<br>\n" ));

echo("<br>\n");

echo(wordwrap($str , 15 , "<br>\n" , TRUE));
?>