<?php
/* 
   case sensitive                case insensitive
 strpos($var , "substring")       stripos($str , substring);
strrpos($var , "substring")      strripos($str , "substring");   
*/

//case Sensitive method strpos() and strrpos()

$str = "Success is a fight between you and yourself. Get up early to fight yourself";
echo(strpos($str , "fight"));
echo("<br>\n");
var_dump(strpos($str , "Fight"));
echo(strpos($str , "Fight"));  //return 0 as false due to case sensitive

// to find string idx from last 
echo(strrpos($str , "fight"));

echo "<br>\n";

//case insensitive method stripos() and strripos()

echo(stripos($str , "success"));
echo("<br>\n");
echo(strripos($str , "fight"));

?>
