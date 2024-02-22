<?php 
/*
Sanitize and validate an Email Address 

Filters:
FILTER_SANITIZE_EMAIL : it removes the illegal character from the email like / , | , \ ,^;
*/

//email Sanitization email

//remove backslashes //

$email = "/ro\hi/t/kirar904/@o\utl\o/ok./com/" ;

$email = filter_var($email , FILTER_SANITIZE_EMAIL);

echo $email ."<br>" ;

//remove escape character

$email  = "rohit\nkirar@gmail$.com#";

$email = filter_var($email , FILTER_SANITIZE_EMAIL);

echo $email . "<br>";

$email = "/ro\hi/t/kirar904/@o\utl\o/ok../com/" ;

$email = filter_var($email , FILTER_SANITIZE_EMAIL);

echo $email ."<br>" ;

?>