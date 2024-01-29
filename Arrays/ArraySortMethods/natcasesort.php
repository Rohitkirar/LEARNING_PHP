<?php 
/*
natcasesort() fn sorts an array by using a natural order algorithm The values keep their original keys.
Syntax
natcasesort(array)
Return Value:	TRUE on success. FALSE on failure
*/
$arr = ["temp15" , "Temp10" , "temp1" , "Temp22" , "temp2"];
natsort($arr);
echo("Natural Order : ");
print_r($arr);

echo("<br>\n");

natcasesort($arr);
echo("Natural order case Insensitive : ");
print_r($arr);
?>