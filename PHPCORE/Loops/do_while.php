<?php 
/*
The do...while loop will always execute the block of code at least once, it will then check the condition, and repeat the loop while the specified condition is true.

*/
$i = 1 ;
do{
    echo($i . " ");
    $i++;
}while($i<6);

echo("<br>\n");
// do_while executes atleast once
$i = 9 ;
do{
    echo($i . " ");
    $i++;
}
while($i<6);

echo("<br>\n");

//break statement
$i = 1 ; 
do{
    if($i == 4) break ; 
    echo($i . " ");
    $i++;
}while($i<6);

echo("<br>\n");

//continue statement
$i = 0 ; 
do{
    $i++;
    if($i==4) continue;
    echo("$i ");
}while($i<6);

echo("<br>\n");

$i=1 ; 
do{
    echo("$i ");
    $i++;
    if($i==21) break;
}while($i);

echo("<br>\n");

//example taking input from user until the password matched with input

$password = "password" ; 
do{
    $input = readline("enter your correct password : ");
}
while($password != $input);

echo("correct password" . "<br>\n");
?>