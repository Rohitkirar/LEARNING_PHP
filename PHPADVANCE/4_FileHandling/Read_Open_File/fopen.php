<?php 
/*
-> fopen(filename , mode) fn used to open a file or url. this fn returns a file pointer that is used to read and write in file
-> fread(fileresource , maxsizetoread) function reads from an open file.
-> filesize(filename) returns size of file in bytes
-> fclose(fileresourceobj) to close an open file

NOTE: It's a good programming practice to close all files after you have finished with them. You don't want an open file running around on your server taking up resources!
->
*/
$myfile = fopen("OpenReadWriteFiles/webdictionary.txt" , "r") or die("Unable to open file!");

var_dump($myfile);

echo "<br>\n" ;

echo " size of file " .  filesize("OpenReadWriteFiles/webdictionary.txt") ;

echo "<br>\n" ;

echo fread($myfile , filesize("OpenReadWriteFiles/webdictionary.txt")) ;

fclose($myfile);
?>