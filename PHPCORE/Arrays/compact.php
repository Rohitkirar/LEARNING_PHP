<?php 
/*
compact() fn create an arr from variable and their values.
Note: Any strings that does not match variable names will be skipped.
Syntax
compact(var1, var2...)

Return Value:	Returns an array with all the variables added to it
*/
$firstname = "Peter" ; 
$lastname = "Griffin" ;
$age = "41" ;
$result = compact("firstname" , "lastname" , "age");
print_r($result);

$name = ["firstname" , "lastname"];
$result1 = compact($name , "location" ,"age");
print_r($result1);
?>