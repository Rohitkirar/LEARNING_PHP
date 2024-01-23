<?php 
/*
sscanf(string , format , arg , arg); used to assign variable from string;
*/
$txt = "age : 50 name : Shrivastav";
sscanf($txt , "age : %u name : %s" , $age , $name);
echo("$age $name");

echo("<br>\n");

$str = "tudent : A  physics : 40  chemistry : 60  maths : 77";
$arr = sscanf($str , "student : %s physics : %u chemistry : %u maths : %u" , $student , $physics , $chemistry , $maths);
var_dump($arr);
?>