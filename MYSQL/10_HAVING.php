<?php 
// Use the MySQL HAVING clause with the GROUP BY clause to specify a filter condition for groups of rows or aggregates.

require_once('FILE/connection.php');

ECHO "<HR> EXAMPLE 1 :uses the GROUP BY clause to get order numbers, the number of items sold per order, and total sales for each from the orderdetails table: <BR>";

$sql = 
"SELECT 
    o.orderNumber , 
    SUM(quantityOrdered) as totalItems , 
    SUM(quantityOrdered*priceEach) as totalprice
FROM 
    orders AS o
JOIN 
    orderdetails AS od
USING
    (orderNumber)
GROUP BY
    orderNumber
HAVING totalItems > 500
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE 2 :uses the GROUP BY clause to get order numbers, the number of items sold per order, and total sales for each from the orderdetails table: <BR>";

$sql = 
"SELECT 
    o.orderNumber , 
    SUM(quantityOrdered) as totalItems , 
    SUM(quantityOrdered*priceEach) as totalprice
FROM 
    orders AS o
JOIN 
    orderdetails AS od
USING
    (orderNumber)
GROUP BY
    orderNumber
HAVING 
    totalItems > 500
AND
    totalprice > 50000;
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE 3 :find all orders that already shipped and have a total amount greater than 1500, you can join the orderdetails table with the orders table using the INNER JOIN <BR>";

$sql = 
"SELECT 
    o.orderNumber,
    status,
    SUM(quantityOrdered*priceEach) AS total
FROM 
    orders AS o
JOIN 
    orderdetails AS od
ON 
    o.orderNumber = od.orderNumber
AND
    o.status = 'shipped'
GROUP BY
    o.orderNumber
HAVING
    total > 50000
AND
    orderNumber BETWEEN 10100 AND 10200
";

require('FILE/printdata.php');


ECHO "<HR> EXAMPLE 4 :lists the number of customers in each country. Only include countries with more than 5 customers: <BR>";

$sql = 
"SELECT 
    country,
    COUNT(customerNumber) AS totalcustomers
FROM 
    customers
GROUP BY
    country
HAVING 
    totalcustomers > 5
ORDER BY
    totalcustomers DESC
";

require('FILE/printdata.php');


ECHO "<HR> EXAMPLE 5 : lists the employees that have registered more than 10 orders <BR>";

$sql = 
"SELECT 
    employeeNumber,
    CONCAT(firstName , ' ' , lastName) As EmpfullName,
    COUNT(orderNumber) as TotalOrder
FROM 
    employees AS e
JOIN
    customers AS c
ON 
    e.employeeNumber = c.salesRepEmployeeNumber
JOIN 
    orders AS o
USING
    (customerNumber)
GROUP BY 
    employeeNumber
HAVING
    TotalOrder > 10 
";

require('FILE/printdata.php');


ECHO '<HR> EXAMPLE 6 : lists if the employees "Davolio" or "Fuller" have registered more than 25 orders<BR>';

$sql = 
"SELECT 
    employeeNumber,
    lastName,
    COUNT(orderNumber) as totalOrder
FROM 
    employees AS e
JOIN
    customers AS c
ON 
    e.employeeNumber = c.salesRepEmployeeNumber
JOIN 
    orders AS o
USING 
    (customerNumber)
WHERE 
    lastName NOT IN ('Davolio' , 'fuller')
GROUP BY
    employeeNumber ,
    lastName
HAVING 
    totalOrder > 25 ;
";

require('FILE/printdata.php');
?>