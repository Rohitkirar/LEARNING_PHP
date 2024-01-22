<?php
//strrev() , str_replace() , trim() , ltrime() , rtrim();

$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30 dfj er reoda  erojawp alvfal woreio alfla0 woprjioed lvncla owe";

//strrev();
$strrev = strrev($str);
print("Reverse String : \n" . $strrev );

"<br>";

//str_replace();
$str = str_replace("30" , "50" , $str);
print("\nREPLACING WORD 30 WITH 50 \n" . $str);

echo("<br>\n");

//trim() , ltrime() ,  rtrim() ;

$str1 = "     dfj fjdl weoe0  dnlfd  sdrjl    
      ";
print("\nORIGINAL STRING : \n" . $str1 );

print("\ntrim() FUNCTION  : \n" . trim($str1));

print("\nrtrim() FUNCTION : \n" .rtrim($str1) . "\n");

print("\nltrim() FUNCTION : \n" . ltrim($str1));


?>