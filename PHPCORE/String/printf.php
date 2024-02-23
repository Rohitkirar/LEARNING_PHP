<?php 
/* 

printf() : output a formatted string and return number of char printed

Possible format values:

%% - Returns a percent sign
%b - Binary number
%c - The character according to the ASCII value
%d - Signed decimal number (negative, zero or positive)
%e - Scientific notation using a lowercase (e.g. 1.2e+2)
%E - Scientific notation using a uppercase (e.g. 1.2E+2)
%u - Unsigned decimal number (equal to or greather than zero)
%f - Floating-point number (local settings aware)
%F - Floating-point number (not local settings aware)
%g - shorter of %e and %f
%G - shorter of %E and %f
%o - Octal number
%s - String
%x - Hexadecimal number (lowercase letters)
%X - Hexadecimal number (uppercase letters)
*/

printf("The sum of %u and %u is %u" , 500 , 200 , 700);

echo(nl2br("\n"));

printf("The name is %s." , "ROHIT");

echo nl2br("\n");

printf("The name is %s  and age is %d" , "Rohit" , -21);

echo nl2br("\n");

printf("The name is %s  and age is %f" , "Rohit" , 21);

echo nl2br("\n");

printf("The name is %s  and age is %F" , "Rohit" , 25);

echo nl2br("\n");

printf("The name is %s  and age is %c" , "Rohit" , 65); // as per ascii table

echo nl2br("\n");

printf("The name is %s  and age is %b" , "Rohit" , 21);

?>