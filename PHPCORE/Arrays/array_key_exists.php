<?php 
/*
array_key_exists() function checks an array for a specified key and returns true if the key exists and false if the key does not exist
Syntax
array_key_exists(key, array)

Return Value:	Returns TRUE if the key exists and FALSE if the key does not exist
*/
$a = ["Volvo"=>"XC90" , "BMW"=>"X5"];

if(array_key_exists("Volvo" , $a))
    echo("key exists!");
else 
    echo("key does not exist");

echo("<br>\n");

$a=array("Volvo"=>"XC90","BMW"=>"X5");
if (array_key_exists("Toyota",$a))
  {
  echo "Key exists!";
  }
else
  {
  echo "Key does not exist!";
  }

echo("<br>\n");

$a1 = ["volvo" , "BMW"];
if(array_key_exists(0,$a1))
    echo("key exists");
else  
    echo("Key does not exist");
?>