<?php 
//ftell(fileresource) : returns current point of file;

$myfile = fopen("OpenReadWriteFiles/demo1.txt" , "r");

echo "current pointer before reading : " . ftell($myfile);

echo fread($myfile , filesize("OpenReadWriteFiles/demo1.txt")) . "<br>";

echo "current pointer before reading : " . ftell($myfile);

fclose($myfile);
?>