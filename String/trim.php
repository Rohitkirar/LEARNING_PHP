<?php
//strrev() , trim() , ltrime() , rtrim();

$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30 dfj er reoda  erojawp alvfal woreio alfla0 woprjioed lvncla owe";

echo("<br>\n");

//trim() , ltrime() ,  rtrim() ;

$str1 = "     dfj fjdl weoe0  dnlfd  sdrjl          ";
print("\nORIGINAL STRING : \n" . $str1 );

print("\ntrim() FUNCTION  : \n" . trim($str1));

print("\nrtrim() FUNCTION : \n" .rtrim($str1) . "\n");


print("\nltrim() FUNCTION : \n" . ltrim($str1));

$x = "Hello WOrld";
echo(ltrim($x, "Hello"));
?>