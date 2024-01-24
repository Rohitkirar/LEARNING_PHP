<?php 
/*
sscanf(string , format , arg , arg); used to assign variable from string;
*/

$stra = "38 Micheal Abelski";
$var = sscanf($stra , "%d %s %s" , $age , $first , $last );
echo "age: $age first: $first last: $last ";
echo("<br>\n");

echo("<br>\n");

$stra = "40 Micheal";
$res = sscanf($stra , "%d %s" , $age , $first);
echo "age: $age first: $first";


?>