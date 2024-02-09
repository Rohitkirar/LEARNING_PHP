<?php 
/*
fgetc() function is used to read a single character from the file 

*/
$myfile = fopen("OpenReadWriteFiles/webdictionary.txt" , 'r');

while(!feof($myfile)){
    echo fgetc($myfile) . " -> ";
}

fclose($myfile);
?>