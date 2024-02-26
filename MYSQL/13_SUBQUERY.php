<?php
/* 
    A MySQL subquery is called an inner query whereas the query that contains the subquery is called an outer query.
    A subquery can be used anywhere that expression is used and must be closed in parentheses.
    A subquery is a query nested within another query (or outer query).
    A correlated subquery depends on the outer query.
*/
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE 1 : <BR>";

$sql =
"SELECT 
    employeeNumber,
    firstName,
    lastName,
    officecode
FROM
    employees
WHERE 
    officeCode 
IN  (
    SELECT officeCode
    FROM offices
    WHERE country = 'USA'
)
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 2 : he following query returns the customer who has the highest payment. <BR>";

$sql =
"SELECT 
    customerNumber,
    checkNumber,
    paymentDate,
    amount
FROM
    payments
WHERE
    amount = (
        SELECT 
            MAX(amount) 
        FROM 
            payments
    )
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 3 : he following query returns the customer who has the  payment above the avg. <BR>";

$sql =
"SELECT 
    customerNumber,
    checkNumber,
    paymentDate,
    amount
FROM
    payments
WHERE
    amount > (
        SELECT 
            AVG(amount) 
        FROM 
            payments
    )
LIMIT 30;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 4 : you can use a subquery with NOT IN operator to find the customers who have not placed any orders as  <BR>";

$sql =
"SELECT 
    customerNumber, 
    CustomerName
FROM
    customers
WHERE
    customerNumber NOT IN (
        SELECT DISTINCT customerNumber FROM orders
    )
";
        
require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 5 :  following subquery finds the maximum, minimum, and average number of items in sale orders:<BR>";

$sql =
"SELECT 
    MAX(items),
    MIN(items),
    AVG(items)                              
FROM
    (
        SELECT orderNumber,
                COUNT(ordernumber) as items
        FROM 
                orderdetails
        GROUP BY 
            orderNumber 
    ) AS TempTable
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 6 : example uses a correlated subquery to select products whose buy prices are greater than the average buy price of all products in each product line.<BR>";

$sql =
"SELECT 
    productname,
    buyprice
FROM
    products AS p1
WHERE
        buyprice > (
            SELECT AVG(buyprice)
            FROM products
            WHERE  productline = p1.productline
        )
";
require('FILE/printdata.php');



ECHO "<HR>EXAMPLE 7 : following query finds sales orders whose total values are greater than 60K..<BR>";

$sql =  
"SELECT 
    orderNumber,
    SUM(quantityOrdered * priceEach) AS total
FROM 
    orders
JOIN 
    orderdetails
USING
    (orderNumber)
GROUP BY 
    orderNumber
HAVING 
    total>60000;
";
require('FILE/printdata.php');



ECHO "<HR>EXAMPLE 8 : correlated subquery to find customers who placed at least one sales order with a total value greater than 60K by using the EXISTS operator: <BR>";

$sql =  
"SELECT 
    customerNumber, 
    customerName
FROM
    customers
WHERE
EXISTS( 
    SELECT 
        orderNumber, 
        SUM(priceEach * quantityOrdered) AS total
    FROM
        orderdetails
            JOIN
        orders 
    USING 
        (orderNumber)
    WHERE
        customerNumber = customers.customerNumber
    GROUP BY 
        orderNumber
    HAVING 
        total > 60000);
";
require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 9 : fetch the first and last names of customers who have placed at least one order.<BR>";

$sql =  
"SELECT 
    customerNumber ,
    customerName
FROM 
    customers AS c
WHERE EXISTS(
    SELECT orderNumber
    FROM orders AS o
    WHERE c.customerNumber = o.customerNumber
    AND o.customerNumber > 400  
)
";
require('FILE/printdata.php');

// When a subquery is used with the EXISTS or NOT EXISTS operator, a subquery returns a Boolean value of TRUE or FALSE

$conn->close();
?>