<?php 
//Example 2 : using w mode
Echo "EXAMPLE 1 : writing file using w mode <br><br>" ;

$myfile = fopen("../OpenReadWriteFiles/demo1.txt" , "w") or die("Unable to open file!");

$txt = "Name : Roman Reign<br>
Designation : Wrestler<br>
Current : WWE Champion<br>
Age : 38 years<br>
country : California<br>
";

fwrite($myfile , $txt)  . "<br>\n";

echo "current pointer of file : " . ftell($myfile) . "<br>";
?>