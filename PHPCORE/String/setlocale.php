<?php 
/* 
setlocale(constant , location) 
Available constants:

LC_ALL - All of the below
LC_COLLATE -  Sort order
LC_CTYPE - Character classification and conversion (e.g. all characters should be lower or upper-case)
LC_MESSAGES - System message formatting
LC_MONETARY - Monetary/currency formatting
LC_NUMERIC - Numeric formatting
LC_TIME - Date and time formatting
*/

setlocale(LC_NUMERIC , "US");

echo(5034345.43434);
?>