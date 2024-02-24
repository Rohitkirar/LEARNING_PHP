<?php 
require_once('FILE/connection.php');

// Use the GROUP BY clause to group rows into subgroups.

ECHO "<HR>Example 1 : it works like distinct keyword in this example returns all the unique value <BR>";


$sql = 
"SELECT status FROM orders 
GROUP BY status;
";

require('FILE/printdata.php');

// GROUP BY clause with an aggregate function to group rows into sets and return a single value for each group.
// An aggregate function performs the calculation of a set of rows and returns a single value.

ECHO "<HR>Example 2 : to obtain the number of orders in each status, you can use the COUNT function with the GROUP BY : <BR>";

$sql = 
"SELECT status , count(*) as totalorders
FROM orders
GROUP BY status
";

require('FILE/printdata.php');


ECHO "<HR>Example 3 :To get the total amount of all orders by status, you join the orders <BR>";

$sql = 
"SELECT o.status , 
        count(DISTINCT o.orderNumber) as totalorders , 
        sum(od.quantityOrdered * od.priceEach) as totalamount
FROM 
    orders as o 
JOIN orderdetails as od 
USING(orderNumber)
GROUP BY status;
";

require('FILE/printdata.php');


ECHO "<HR>Example 4 : To get the orderNumber and  total amount of all orders by orderNumber, you join the orders <BR>";

$sql = 
"SELECT o.orderNumber , 
        sum(od.quantityOrdered * od.priceEach) as totalAmount
FROM orders as o 
JOIN orderdetails as od
USING(orderNumber)
GROUP BY orderNumber
LIMIT 20 ;
";

require('FILE/printdata.php');


ECHO "<HR>Example 5 : group rows by expressions. The following query calculates the total sales for each year: <BR>";

$sql = 
"SELECT YEAR(orderdate) as year,
        SUM(quantityOrdered * priceEach) as totalsales
FROM orders as o 
JOIN orderdetails as od 
ON o.orderNumber = od.orderNumber 
AND status = 'shipped'
GROUP BY year;
";

require('FILE/printdata.php');

// -- To filter the groups returned by GROUP BY clause, you use a  HAVING clause.;

ECHO "<HR>Example 6 : query uses the HAVING clause to select the total sales of the years after 2003.<BR>";

$sql = 
"SELECT YEAR(orderDate) as year,
        ROUND(sum(quantityOrdered * priceEach)) as totalamount
FROM orders
JOIN orderdetails
USING(orderNumber)
WHERE status='shipped'
GROUP BY year
HAVING year>2003
";

require('FILE/printdata.php');


ECHO "<HR>Example 7 :  query returns the year, order status, and the total order for each combination of year and order status by grouping rows into groups:<BR>";

$sql = 
"SELECT YEAR(orderdate) AS year,
        status,
        COUNT(orderNumber) as totalorder
FROM orders as o 
JOIN orderdetails as od
USING(orderNumber)
GROUP BY year,
        status
";

require('FILE/printdata.php');


ECHO "<HR>Example 8 :  SQL statement lists the number of customers in each country:<BR>";

$sql = 
"SELECT country , COUNT(customerNumber) as totalCustomer
FROM customers
GROUP BY country
ORDER BY totalCustomer DESC;
";

require('FILE/printdata.php');


?>