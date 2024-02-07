<?php 
//EXAMPLE 1 fwrite using r+ -> reading/writing(r->only for reading) mode
// Note It doesn't create file like w+ and a+ mode if not found but it overwrites the previous file
ECHO "EXAMPLE 1 : write and reading file using r+ mode <BR>";

$myfile = fopen("../OpenReadWriteFiles/demo1.txt" , "r+") or die("Unable to open file");
$text = "Name : Roman Reign<br>
Designation : Wrestler<br>
Current : WWE Champion<br>
Age : 38 years<br>
country : California<br>
";
echo "current pointer of file before writing : " . ftell($myfile) ."<br>" ; 
fwrite($myfile , $text);
echo "current pointer of file after writing : " . ftell($myfile) ."<br>" ; 
fseek($myfile , 0 );
echo "current pointer of file after fseek() : " . ftell($myfile) ."<br>" ; 
echo fread($myfile , filesize("../OpenReadWriteFiles/demo1.txt"));

echo "current pointer of file after fread() : " . ftell($myfile) ."<br>" ; 
fclose($myfile);

?>