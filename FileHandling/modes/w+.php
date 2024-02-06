<?php 

//Example 1 : using w+ mode
Echo "EXAMPLE 1 : writing and reading file using w+ mode <br><br>" ;

$myfile = fopen("../OpenReadWriteFiles/demo1.txt" , "w+") or die("Unable to open file!");

$txt = "Name : Arun Prajapati<br>
Designation : Project Manager<br>
Salary : 100000<br>
Address : Bhopal<br>";

fwrite($myfile , $txt)  . "<br>\n";

echo "current pointer of file : " . ftell($myfile) . "<br>";

echo "current pointer of file : " . fseek($myfile , 0) . 
"<br><br>";

echo fread($myfile , filesize("../OpenReadWriteFiles/demo1.txt")) . "<br>";

echo "current pointer of file : " . ftell($myfile) . "<br>\n";

fclose($myfile);

echo "<BR><BR>";

?>