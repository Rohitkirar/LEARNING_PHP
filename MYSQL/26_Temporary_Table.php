<?php 
/**
 * -> Summary
 * MySQL automatically deletes all temporary tables once the session is ended.
 * Use the CREATE TEMPORARY TABLE statement to create a temporary table.
 * Use the DROP TEMPORARY TABLE statement to drop a temporary table.
 */

require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE 1 : CREATING TEMPORARY TABLE :  <BR>";

$sql = 
"CREATE TEMPORARY TABLE credits(
    customerNumber INT PRIMARY KEY ,
    creditLimit DECIMAL(10 ,2)
);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 2 : INSERTING DATA FROM customertable <BR>";

$sql = 
"INSERT INTO credits (customerNUMBER , creditlimit)
SELECT customerNumber , creditlimit 
FROM customers
WHERE creditlimit > 0 ;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 3 : output the data of temporary table<BR>";

$sql = 
"SELECT * FROM credits;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 4 : DROP TEMPORARY TABLE<BR>";

$sql = 
"DROP TEMPORARY TABLE credits;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 5 : AFTER DROP TEMPORARY TABLE AND try to output data<BR>";

$sql = 
"SELECT * FROM credits;
";

require('FILE/printdata.php');

$conn->close();
?>