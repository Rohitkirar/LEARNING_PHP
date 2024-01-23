<?php
/*
strcspn($str , chr) : print the count(number) of char including spaces before the specified word char matches
we can also pass the range index in which we have to search the arguments are optional
strcspn($str , chr , low , high);
*/

$str = "Hello World";
echo(strcspn($str , 'r'));

echo("<br>\n");

echo(strcspn("HELLO WORLD" , "w")); // return length no char match

echo("<br>\n");

echo(strcspn("Hello World" , "llo"));


?>