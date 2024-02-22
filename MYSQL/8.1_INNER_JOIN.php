<?php
require_once('FILE/connection.php');

/*
Note: The INNER JOIN keyword returns only rows with a match in both tables.
Which means that if you have a product with no CategoryID, or with a CategoryID 
that is not present in the Categories table, that record would not be returned in the result.
*/

ECHO "<HR>EXAMPLE 1 : JOINING 2 Table using USING() <BR>";

$sql = 
"SELECT employeeNumber , 
CONCAT(firstName , ' ' , lastname) as FullName, 
city , state , country
FROM employees
INNER JOIN
offices USING(officeCode)
WHERE state IS NOT NULL
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 2 :: JOINing 2 TABLE using ON <BR>";

$sql = 
"SELECT  employeeNumber ,
firstName , lastname , city , state , country
FROM employees as e
INNER JOIN 
offices as o 
ON e.officeCode = o.officeCode
WHERE state IS NOT NULL
";

require("FILE/printdata.php");


ECHO "<HR>EXAMPLE 3 :: JOINING THREE TABLE TO GET DATA<BR>";

$sql = 
"SELECT customerNumber , customerName , 
COUNT(orderNumber) as TotalOrder , 
SUM(amount) as TotalAMount
FROM customers
INNER JOIN
orders USING(customerNumber)
INNER JOIN
payments USING(customerNumber)
GROUP BY customerNumber
HAVING TotalOrder > 10 
ORDER BY TOTALORDER DESC
";

require("FILE/printdata.php");
?>