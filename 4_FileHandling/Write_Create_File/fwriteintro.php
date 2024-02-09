<?php 
/*
fopen() function is also used to create a file. Maybe a little confusing, but in PHP, a file is created using the same function used to open files.
If you use fopen() on a file that does not exist, it will create it, given that the file is opened for writing (w) or appending (a).

The fwrite() function is used to write to a file.
The first parameter of fwrite() contains the name of the file to write to and the second parameter is the string to be written.

w mode : erase data from existing file or if not found create new file
*/

//Example 1 : using w / w+ mode
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
//EXAMPLE 2 fwrite using r+ -> reading/writing(r->only for reading) mode
// Note It doesn't create file like w+ and a+ mode if not found but it overwrites the previous file
ECHO "EXAMPLE 2 : write and reading file using r+ mode <BR>";

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


//Example 3 : write/read using a+ mode this mode is used to append any data in file 

Echo "EXAMPLE 3 Read/Write using a+ mode : <br><br>" ;

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