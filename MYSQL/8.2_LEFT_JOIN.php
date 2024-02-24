<?php 
require_once('FILE/connection.php');

// The LEFT JOIN keyword returns all records from the left table (Customers), even if there are no matches in the right table (Orders).


ECHO "<HR>EXAMPLE 1 : joining customers and orders table using LEFT JOIN to find customer who never order<BR>";

$sql = 
"SELECT c.customerNumber , c.customerName , o.orderNumber , o.status
FROM customers as c 
LEFT JOIN 
orders as o 
USING(customerNumber)
WHERE orderNumber IS NULL 
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 2 : joining employees, customers and payments table get empfullName , customerName , checkNumber, amount <BR>";

$sql = 
"SELECT CONCAT(e.firstName,' ' ,e.lastName) AS empFullName,
c.customerName , p.checkNumber , p.amount 
FROM employees AS e 
LEFT JOIN 
customers AS c 
ON e.employeeNumber = c.salesRepEmployeeNumber 
LEFT JOIN 
payments AS p 
USING(customerNumber) 
ORDER BY c.customerName,
p.amount DESC
LIMIT 30;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 3 : left join with condition in ON o.orderNUmber = 10100 <BR>";

$sql = 
"SELECT o.orderNumber , o.customerNumber , od.productCode
FROM 
orders AS o 
LEFT JOIN 
orderdetails AS od 
ON o.orderNumber = od.orderNumber 
AND o.orderNumber = 10100
ORDER BY orderNumber
LIMIT 30 ;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 4 : left join with condition in WHERE o.orderNUmber = 10100 <BR>";

$sql = 
"SELECT o.orderNumber , o.customerNumber , od.productCode
FROM 
orders AS o 
LEFT JOIN 
orderdetails AS od 
ON o.orderNumber = od.orderNumber 
WHERE o.orderNumber = 10100
ORDER BY orderNumber
LIMIT 30;
";

require('FILE/printdata.php');

$conn->close();
?>