<?php 
//filesize(filename) returns the size of file in bytes


$myfile = fopen("OpenReadWriteFiles/demo1.txt" , "r");

echo "Total size of file : " . filesize("OpenReadWriteFiles/demo1.txt") . "<br>";

echo fread($myfile , filesize("OpenReadWriteFiles/demo1.txt")) . "<br>";

fclose($myfile);
?>