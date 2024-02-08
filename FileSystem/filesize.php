<?php 
//filesize(filename) returns the size of file in bytes


$myfile = fopen("../FileHandling/OpenReadWriteFiles/demo1.txt" , "r");

echo "Total size of file : " . filesize("../FileHandling/OpenReadWriteFiles/demo1.txt") . "<br>";

echo fread($myfile , filesize("../FileHandling/OpenReadWriteFiles/demo1.txt")) . "<br>";

fclose($myfile);
?>