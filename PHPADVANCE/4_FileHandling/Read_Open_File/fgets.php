<?php 
/*
fgets() function used to read a single line only from a file
Syntax => fgets(fileresoure) 
*/

$myfile = fopen("OpenReadWriteFiles/webdictionary.txt" , "r") or die("Unable to open file");

echo fgets($myfile) . "<br>";
echo fgets($myfile) . "<br>";

fseek($myfile , 0 ); // shifts pointer to beginning

echo fgets($myfile) . "<br>";
echo fgets($myfile) . "<br>";

echo "Looping through the webdictionary file <br>\n" ;

//Example 2 : printing each line of file using fgets() function
echo fseek($myfile , 0) ."<br>\n";

while(!feof($myfile)){
    echo fgets($myfile) . "<br>\n";
}

fclose($myfile);
?>