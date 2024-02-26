<?php 
require_once('FILE/connection.php');

/**
 * MySQL UNION operator allows you to combine two or more result sets of queries into a single result set
 * 
 * UNION statement to combine data from multiple queries into a single result set.
 */

ECHO "<HR>Example 1 : <BR>";

$sql = 
"SELECT 
    customerNumber
FROM 
    customers
UNION
SELECT 
    customerNumber
FROM 
    customers_archive
ORDER BY customerNumber
LIMIT 30
";

require('FILE/printdata.php');

ECHO "<HR>Example 2 :  UNION combine DISTINCT data from both table in column <BR>";

$sql = 
"SELECT 
    customerNumber
FROM
    customers
UNION
SELECT 
    customerNumber
FROM
    orders
ORDER BY 
    customerNumber
LIMIT 30
";

require('FILE/printdata.php');

ECHO "<HR>Example 3 : we have to mention same no of col in both sql query during union <BR>";


$sql = 
"SELECT 
    customerNumber 
FROM
    customers
UNION ALL
SELECT 
    customerNumber
FROM orders
ORDER BY
    customerNumber
LIMIT 30
";

require('FILE/printdata.php');

ECHO "<HR>Example 4 : combine the first name and last name of employees and customers into a single result set, you can use the UNION operator as follows: <BR>";


$sql = 
"SELECT
    customerNumber,
    customerName
FROM
    customers
UNION ALL
SELECT 
    employeeNumber,
    CONCAT(firstName,' ' , lastName) as employeeName
FROM
    employees
ORDER BY
    customerNumber desc
LIMIT 30
";

require('FILE/printdata.php');


ECHO "<HR>Example 5 : Change the name of column in result set : <BR>";


$sql = 
"SELECT
    customerNumber as ID,
    customerName as FullName
FROM
    customers
UNION ALL
SELECT 
    employeeNumber,
    CONCAT(firstName,' ' , lastName) as employeeName
FROM
    employees
ORDER BY ID DESC
LIMIT 40;
";

require('FILE/printdata.php');


ECHO "<HR>Example 6 : To differentiate between employees and customers, you can add a column<BR>";

$sql = 
"SELECT
    customerNumber as ID,
    customerName as FullName,
    'customer' AS contactType
FROM
    customers
UNION ALL
SELECT 
    employeeNumber,
    CONCAT(firstName,' ' , lastName) as employeeName,
    'employee' AS contactType
FROM
    employees
ORDER BY ID DESC
LIMIT 40;
";

require('FILE/printdata.php');


ECHO "<HR>Example 7 : sort the result by column position in order BY clause<BR>";

$sql = 
"SELECT 
    customerNumber as ID,
    customerName as FULLNAME,
    'customer' AS contactType
FROM 
    customers
UNION
SELECT 
    employeeNumber,
    CONCAT(firstName , '  ' , lastName),
    'employee' AS contactType
FROM 
    employees
ORDER BY 2

";

require('FILE/printdata.php');
$conn->close();
?>