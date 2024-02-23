<?php 
/*
basename() fn returns the filename from a path;
Syntax 
basename(path , suffix);
*/
$path = "/testweb/home.php" ;

echo(basename($path)) . "<br>\n";

echo(basename($path , ".php"))."<br>\n";
?>