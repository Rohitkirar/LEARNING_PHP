<?php 
/**
 * 1. find the username from the given email using pure string function. ex : anant@gmail.com => answer : anant
 */
Echo "METHOD 1 : <BR>\n";

$str = "anant@gmail.com";

echo(strstr($str , "@" , true));

echo("<br>\n");

// METHOD 2 

Echo "METHOD 2 : <BR>\n";
$str = "anant@gmail.com";
$idx = stripos($str , "@");
echo("Using stripos and strstr : UserName : " . substr($str ,0 ,  $idx));

echo "<br>\n";

// METHOD 3
Echo "METHOD 3 : <BR>\n";

$str = "anant@gmail.com";

print("Using explode : Your Username : " . explode("@" , $str)[0]);

echo "<br>\n";

// METHOD 4 
Echo "Method 4 : <BR>\n";
$username = "";
foreach(str_split($str ) as $value){
    if($value == "@") break;
    $username .= $value;
}
echo "Using Loops : Your username is : " , $username ;
?>