<?php 
//EXAMPLE 1 fwrite using r+ -> reading/writing(r->only for reading) mode
// Note It doesn't create file like w+ and a+ mode if not found and the pointer start from begining and it overwrites the previous text with the new one 
// imp not replace full text it replace only the required size from beginning

ECHO "EXAMPLE 1 : write and reading file using r+ mode <BR>";

$myfile = fopen("../OpenReadWriteFiles/demo1.txt" , "r+") or die("Unable to open file");
$text = "Name : John Cena<br>
Designation : Wrestler<br>
Current : 16 times WWE Champion<br>
Age :  55 years<br>
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