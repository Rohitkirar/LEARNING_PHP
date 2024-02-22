<?php 
/*
soundex(string) 
The soundex() function calculates the soundex key of a string.

A soundex key is a four character long alphanumeric string that represent English pronunciation of a word.

The soundex() function can be used for spelling applications.

Note: The soundex() function creates the same key for similar sounding words.

Tip: metaphone() is more accurate than soundex(), because metaphone() knows the basic rules of English pronunciation.
*/
echo(soundex("Hello"));

echo nl2br("\n");
echo(soundex("HELLO"));

echo("<BR>\n");
echo(soundex("HELLO WORLD"));

echo("<br>\n");
echo(metaphone("Hello") . " " . soundex("Hello"));
?>