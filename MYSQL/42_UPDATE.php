<?php 

// Note: Be careful when updating records in a table!
// Notice the WHERE clause in the UPDATE statement. 
// The WHERE clause specifies which record(s) that should be updated. If you omit the WHERE clause, all records in the table will be updated!

require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE : fetching data before updating <BR>";

$sql = 
"SELECT firstName , lastName , email
FROM employees
WHERE employeeNumber = 1056;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : update Mary Patterson to the new email mary.patterso@classicmodelcars.com.<BR>";

$sql = 
"UPDATE employees
SET email = 'mary.patterson@classicmodelcars.com'
WHERE employeeNumber = 1056;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : -- update values in multiple columns <BR>";

$sql = 
"UPDATE employees
SET lastName = 'Hill',
    email = 'mary.Hill@classicmodelcars.com'
WHERE employeeNumber = 1056;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : <BR>";

$sql = 
"SELECT email
FROM employees
WHERE jobTitle = 'Sales Rep' AND officeCode = 6;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : --MySQL UPDATE to replace string example<BR>";

$sql = 
"UPDATE employees
SET email = (REPLACE(email , '@classicmodelcars.com' , '@gmail.com'))
WHERE jobTitle = 'Sales Rep' AND
    officeCode = 6 ;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : Setting employeenumber to customer whose sales rep number is null<BR>";

$sql = 
"UPDATE customers_archive
SET salesRepEmployeeNumber = (
    SELECT 
        employeeNumber
    FROM employees
    WHERE 
        jobTitle = 'Sales Rep'
    ORDER BY RAND() -- every customer get random employeeNumber
    LIMIT 1
)
WHERE 
    salesRepEmployeeNumber IS NULL ;
";

ECHO "<HR>EXAMPLE : OUTPUT OF customers_archive<BR>";

$sql = 
"SELECT 
customerName,
SalesRepEmployeeNumber
FROM
customers_archive;
";

require('FILE/printdata.php');

?>