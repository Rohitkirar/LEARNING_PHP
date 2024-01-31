<?php 
/*
3. find the first index where string is different ex : "football" and "footboll => answer : index is 4
*/
$str1 = "football" ;
$str2 = "footboll" ;

echo(strspn($str1, $str2));
?>