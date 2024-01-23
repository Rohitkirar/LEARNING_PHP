<?php 
/*
The str_rot13() function performs the ROT13 encoding on a string.
The ROT13 encoding shifts every letter 13 places in the alphabet. Numeric and non-alphabetical characters remains untouched.
Encoding and decoding are done by the same function. 
If you pass an encoded string as argument, the original string will be returned.
*/

$str = "Hello World!" ;
echo("ORIGINAL STRING : " . $str);
echo("<br>\n");

$encodestr = str_rot13($str);
echo("ENCODED STRING : $encodestr");
echo("<br>\n");

echo("DECODED STRING : " . str_rot13($encodestr));
?>