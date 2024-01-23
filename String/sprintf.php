<?php 
/* 
The sprintf() function writes a formatted string to a variable.
*/

$txt = sprintf("The boy name is %s and his age is %u" , "Arun" , 22);
echo($txt);

echo("<br>\n");


$str = printf("The boy name is %s and his age is %u" , "Arun" , 22);
echo("<br>\n");
echo ($str);

echo("<br>\n");
$number = 123;
$txt = sprintf("With 2 decimals: %.1f 
<br>With no decimals: %1\$u",$number);
echo $txt;
?>
?>