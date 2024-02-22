<?php
/* 
Task 1 : Email validation 
constrant to be check
1) only starting with alphabet letter not with numbers
2) ending with .in or .com only
3) contain @ 
*/
$str = "arun34@gmail.com";

if(str_contains($str , "@") && (str_contains($str , ".in") || str_contains($str , ".com")))
    echo("valid email");
else
    echo("invalid email");

echo "<br>\n";

Echo "METHOD 2 : <BR>\n";

$email = "arun34@gmail.com";

$pattern = "/[A-Za-z]+[_\-\.]?[A-Za-z0-9]+[_\-\.]?[A-Za-z0-9]+@(gmail|yahoo|outlook|mail)\.(com|in)/" ;

$result = preg_match($pattern , $email , $matcharray);

if($result)
    echo "$email is a Valid email";
else
    echo "Invalid email";

echo("\n<br>\n");

?>