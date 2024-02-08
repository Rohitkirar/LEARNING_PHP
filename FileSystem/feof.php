<?php 
/*
-> feof() function checks if the "end-of-file" (EOF) has been reached.
-> feof() function is useful for looping through data of unknown length.
*/

//looping through the file to print data

$myfile = fopen("../FileHandling/OpenReadWriteFiles/webdictionary.txt" , "r");

var_dump(feof($myfile));

echo "<br>\n" ;

while(!feof($myfile)){
    echo fgets($myfile) . "<br>\n";
}

var_dump(feof($myfile));

var_dump(fclose($myfile));
?>