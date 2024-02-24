<?php 
require_once("FILE/connection.php");

ECHO "<HR> TASK BY SAGAR SIR : state-not null, country = usa, germany, 
credit limit 50k to 2L, (cus from first 10 and last 10) apply at end, print cus no., full name, country ,state ,limit :<BR>";

ECHO "FIRST 10 RECORDS <BR>";

$sql = 
"SELECT customernumber, CONCAT(contactfirstName, ' ' , contactlastName) as fullName , state , country , creditlimit
FROM customers
WHERE country IN ('usa' , 'germany') 
AND state IS NOT NULL 
AND creditlimit BETWEEN 50000 AND 200000
ORDER BY customerNumber
LIMIT 0,10  
";

require("FILE/printdata.php");

ECHO "LAST 10 RECORDS <BR>";
$sql = 
"SELECT customernumber, CONCAT(contactfirstName, ' ' , contactlastName) as fullName , state , country , creditlimit
FROM customers
WHERE country IN ('usa' , 'germany') 
AND state IS NOT NULL 
AND creditlimit BETWEEN 50000 AND 200000
ORDER BY customerNumber DESC
LIMIT 10
";

require("FILE/printdata.php");


ECHO "<HR>EXAMPLE 1 : customer details with full address :<BR>";

$sql = 
"SELECT customernumber, customerName, phone , CONCAT(addressLine2 ,', ', state, ', ' , country) as fullAddress
FROM customers
WHERE country = 'USA' 
AND addressLine2 IS NOT NULL 
AND state IS NOT NULL 
ORDER BY customerNumber;
";

require("FILE/printdata.php");



ECHO "<HR>EXAMPLE 2 :TOTAL Stock available as per category <BR>";

$sql = 
"SELECT productLine , SUM(quantityInStock) as totalStock
FROM products
WHERE 
productLine = 'Motorcycles'
OR productLine = 'classic cars'
GROUP BY productLine
ORDER BY productLine;" ;

require("FILE/printdata.php");



ECHO "<HR>EXAMPLE 3 : The stock below 5000 as per category  <BR>";
$sql = 
"SELECT productCode , productName , productLine , productVendor , quantityInStock
FROM products
WHERE 
productLine = 'motorcycles' 
OR productLine = 'classic cars' 
AND quantityInStock <= 5000
ORDER BY productLine,
productVendor ASC,
quantityInStock DESC;";

require("FILE/printdata.php");



ECHO "<HR>EXAMPLE 4 : TOP 10 customer as Highest transaction amount<BR>";

$sql = 
"SELECT customerNumber , sum(amount) as totalAmount
FROM payments
GROUP BY customerNumber
Order BY totalAmount DESC
LIMIT 10;
";

require("FILE/printdata.php");



ECHO "<HR>EXAMPLE 5 : TOtal transaction amount data in year 2005 :  <BR>";

$sql = 
"SELECT customerNumber , sum(amount) as totalAmount , SUBSTR(paymentDate, 1 , 4) as year
FROM payments
WHERE paymentDate BETWEEN '2005-01-01' AND '2005-12-31'  
GROUP BY customerNumber 
ORDER BY paymentDate DESC;
";

require("FILE/printdata.php");



ECHO "<HR>EXAMPLE 6  : TOtal transaction amount data per year:  <BR>";

$sql = 
"SELECT sum(amount) as totalAmount , SUBSTR(paymentDate,1 , 4) as year 
FROM payments
GROUP BY year
ORDER BY year DESC;
";

require("FILE/printdata.php");



ECHO "<HR>EXAMPLE 7  : get customer details only from france , spain , japan , USA whose creditlimit not equal to 0  address is not null<BR>";

$sql = 
"SELECT customerName , creditLimit , CONCAT(addressline1 , ', ' , state , ', ' , country) as fullAddress
FROM customers
WHERE creditLimit != 0 
AND state IS NOT NULL 
AND country IN ('france' , 'spain' , 'japan', 'USA')
ORDER BY FIELD(country ,'france' , 'spain' ,'japan' , 'USA'),
creditLimit DESC;
";

require("FILE/printdata.php");

ECHO "<HR>EXAMPLE 8  : employee details and which person they are reports : <BR>";

$sql = 
"SELECT employeeNumber , 
CONCAT(firstName , ' ' , lastName) as fullName,
email , 
(SELECT CONCAT(firstName , ' ' , lastName) 
FROM employees 
WHERE employeeNumber = 1002) as reportsTo 
FROM employees 
WHERE officeCode = 1  AND reportsTo = 1002; 
";

require("FILE/printdata.php");

$conn->close();
?>