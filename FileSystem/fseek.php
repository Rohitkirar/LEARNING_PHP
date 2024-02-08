<?php 
/*
fseek(fileresource , idx); it is used to change the pointer of file
*/

$myfile = fopen("../FileHandling/OpenReadWriteFiles/demo1.txt" , "r") or die("Unable to open file") ;

echo "before reading pointer : " . ftell($myfile) . "<br>";

echo fread($myfile , filesize("../FileHandling/OpenReadWriteFiles/demo1.txt"));

echo "after reading pointer : " . ftell($myfile) . "<br>";

fseek($myfile , 0 );

echo "after fseek() used pointer : " . ftell($myfile) . "<br>";


fclose($myfile);

?>