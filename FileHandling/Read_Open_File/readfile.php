<?php 
/*
*readfile() function is useful if all you want to do is open up a file and read its contents.
*readfile() function returns the number of bytes read on success
*/
echo readfile("../OpenReadWriteFiles/demo.txt");

echo "<br>";

echo readfile("../OpenReadWriteFiles/webdictionary.txt");

echo "<br>";

echo readfile("../../Include/menu.php");

?>