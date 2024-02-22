<?php 
//ftell(fileresource) : returns current point of file;

$myfile = fopen("../FileHandling/OpenReadWriteFiles/demo1.txt" , "r");

echo "current pointer before reading : " . ftell($myfile);

echo fread($myfile , filesize("../FileHandling/OpenReadWriteFiles/demo1.txt")) . "<br>";

echo "current pointer before reading : " . ftell($myfile);

fclose($myfile);
?>