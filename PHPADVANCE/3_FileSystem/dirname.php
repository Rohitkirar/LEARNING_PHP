<?php 
/*
dirname() fn returns the path of the parent directory
Syntax 
dirname(path , Levels);
Parameter	Description
path	Required. Specifies a path to check
levels	Optional. An integer that specifies the number of parent directories to go up. Default is 1
Return Value:	The path of the parent directory on success
*/

echo dirname("c:/testweb/home.php") . "<br>\n";

echo dirname("C:/testweb/home.php" , 2) . "<br>\n";

echo dirname("/testweb/home.php");
?>