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


ECHO "<HR>EXAMPLE 4 :: Join 3 three table customers, orders, payments to find customer customernumber , customerName phone , fulladdress , salesRep , creditlimit , totalorder , totalamount<BR>";

$sql = 
"SELECT customerNumber , customerName , phone , CONCAT(addressLine1, ', ' , city, ', ' , state, ', ' , postalCode, ', ' , country) as Address , salesRepEmployeeNumber , creditLimit , count(orderNumber) as totalOrder , sum(amount) as totalAmount FROM customers 
JOIN
orders USING(customerNumber)
JOIN
payments
USING(customerNumber)
WHERE state IS NOT NULL 
AND city IS NOT NULL
AND postalCode IS NOT NULL
AND country IS NOT NULL 
AND addressLine1 IS NOT NULL
GROUP BY customerNumber
LIMIT 20;
";

require("FILE/printdata.php");


ECHO "<HR>EXAMPLE 5 :: JOIN 3 tables orders , orderdetails and products and get orderNumber, orderdate , orderLineNumber , productName , quantityOrdered , priceEach<BR>";

$sql = 
"SELECT  o.orderNumber , o.orderdate , od.orderLineNumber , p.productName , od.quantityOrdered , od.priceEach
FROM orders AS o 
JOIN orderdetails AS od USING(orderNumber)
JOIN products AS  p USING(productCode)
ORDER BY o.orderNUMBER, 
orderLineNumber
LIMIT 20;
";

require("FILE/printdata.php");


ECHO "<HR>EXAMPLE 6 :: get orderNumber , orderstatus and total sales from orders and orderdetails table using group by clause<BR>";

$sql = 
"SELECT o.orderNumber , o.status , sum(od.quantityOrdered * od.priceEach) as total
FROM orders as o 
JOIN 
orderdetails as od
ON o.orderNumber = od.orderNumber
GROUP BY orderNumber
LIMIT 20;
";

require("FILE/printdata.php");


ECHO "<HR>EXAMPLE 7 :: get productCode , productname from product table and textDescription from productlines<BR>";

$sql = 
"SELECT p.productCode , p.productname , pl.textDescription 
FROM products AS p 
JOIN 
productlines AS pl
USING(productline)
LIMIT 20;
";

require("FILE/printdata.php");


ECHO "<HR>EXAMPLE : 8 : joining 4 tables customers, orders, orderdetails and products<BR>";

$sql = 
"SELECT orderNumber, orderDate , customerName , orderLineNumber , productName , quantityOrdered , priceEach
FROM orders
JOIN orderdetails USING (orderNumber)
JOIN products USING(productCode)
JOIN customers USING(customerNumber)
WHERE orderNumber BETWEEN 10102 AND 10105
ORDER BY orderNumber,
orderLineNumber
";

require("FILE/printdata.php");


ECHO "<HR>EXAMPLE  : 9 : In addition to the equal operator (=), you can use other operators such as greater than ( >), less than ( <), and not-equal ( <>) operator to form the join condition.
<BR>";

$sql = 
"SELECT c.customerNumber , c.customerName , count(o.orderNumber) as totalOrder , sum(od.quantityOrdered*od.priceEach) as totalAmount
FROM orders as o 
JOIN orderdetails as od USING(orderNumber)
JOIN customers as c ON o.customerNumber = c.customerNumber
AND c.customerNumber BETWEEN 100 AND 200 
GROUP BY customerNumber;
";

require("FILE/printdata.php");


?>