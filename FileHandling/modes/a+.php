<?php 

//Example 1 : write/read using a+ mode this mode is used to append any data in file 

Echo "EXAMPLE 1 Read/Write using a+ mode : <br><br>" ;

$myfile = fopen("../OpenReadWriteFiles/demo1.txt" , "a+") or die("Unable to open file") ;

$text = "Name : Rock<br>
Designation : Wrestler/Actor<br>
Salary : 200000<br>
Country : Argentina<br>";

echo "current pointer of file before writing : " . ftell($myfile) ."<br>" ; 

fwrite($myfile , $text);

echo "current pointer of file after writing : " . ftell($myfile) ."<br>" ; 

fseek($myfile , 0 );

echo "current pointer of file after fseek()  : " . ftell($myfile) ."<br>" ; 

echo clearstatcache(true ,"../OpenReadWriteFiles/demo1.txt") . "<br>"; // used to clear cache memory

echo "size of file : " . filesize("../OpenReadWriteFiles/demo1.txt"). "<br>" ;

echo fread($myfile ,filesize("../OpenReadWriteFiles/demo1.txt")) . "<br>";

echo "current pointer of file after reading file : " . ftell($myfile) ."<br>" ; 

fclose($myfile);

?>