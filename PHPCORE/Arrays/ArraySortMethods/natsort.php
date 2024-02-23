<?php 
/*
natsort() function sorts an array by using natural order alogorithm the values keep their original keys

In a natural algorithm, the number 2 is less than the number 10. In computer sorting, 10 is less than 2, because the first number in "10" is less than 2.
Syntax : 
natsort($arr);
return type:  
Return Value:	Returns TRUE on success, or FALSE on failure.


*/

$temp_files = ["temp15.txt" , "temp10.txt" , "temp1.txt" , "temp22.txt" , "temp2.txt"];
sort($temp_files);
echo "Standard sorting : ";
print_r($temp_files);

echo("<br>\n");

natsort($temp_files);
echo "Natural order : ";
print_r($temp_files);
?>