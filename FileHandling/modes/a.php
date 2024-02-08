<?php 

//Example 1 : write using a mode this mode is used to append any data in file 

Echo "EXAMPLE 1 Write using a mode : <br><br>" ;

$myfile = fopen("../OpenReadWriteFiles/demo1.txt" , "a") or die("Unable to open file") ;

$text = "Name : People Champ Rock<br>
Designation : Wrestler/Actor<br>
Salary : 200000<br>
Country : Argentina<br>";

echo "current pointer of file before writing : " . ftell($myfile) ."<br>" ; 

fwrite($myfile , $text);

echo "current pointer of file after writing : " . ftell($myfile) ."<br>" ; 

fclose($myfile);

?>