<?php 
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE 1 : query gets the top five products by sales revenue in 2003 from the orders and orderdetails tables<BR>";

$sql = 
"SELECT 
    productCode,
    SUM(quantityOrdered * priceEach) AS sales
FROM
    orders AS o
JOIN
    orderdetails AS od
USING
    (orderNumber)
WHERE 
    YEAR(shippedDate) = 2003
GROUP BY productCode
ORDER BY sales DESC
LIMIT 5;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 2 :query gets the top five products by sales revenue in 2003 from the orders and orderdetails<BR>";

$sql = 
"SELECT productName , sales
FROM
    (SELECT 
        productCode,
        SUM(quantityOrdered * priceEach) AS sales
    FROM
        orders AS o
    JOIN
        orderdetails AS od
    USING
        (orderNumber)
    WHERE 
        YEAR(shippedDate) = 2003
    GROUP BY productCode
    ORDER BY sales DESC
    LIMIT 5) AS top5product2003
JOIN
    products AS p
USING
    (productCode)
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 3 :Suppose you have to classify the customers who bought products in 2003 into 3 groups: platinum, gold, and silver. And you need to know the number of customers in each group with the following conditions:<BR>
    Platinum customers who have orders with a volume greater than 100K.<BR>
    Gold customers who have orders with a volume between 10K and 100K.<BR>
    Silver customers who have orders with a volume of less than 10K.<BR>";

$sql = 
"SELECT 
    customerNumber,
    SUM(quantityOrdered * priceEach) AS sales,
    (CASE
        WHEN SUM(quantityOrdered * priceEach) > 100000 then 'plantinum'
        WHEN SUM(quantityOrdered * priceEach) BETWEEN 10000 and 100000 then 'gold'
        WHEN SUm(quantityOrdered * priceEach) < 10000 then 'silver'
    END) AS customerGroup
FROM
    orderdetails
JOIN orders
USING(orderNumber)
WHERE YEAR(shippeddate) = 2003
GROUP BY
    customerNumber
ORDER BY 
    customerGroup DESC
    ";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 4 : count of each group of example 3 <BR>";

$sql = 
"SELECT customerGroup,
        COUNT(customerGroup) as total
FROM
    (SELECT 
        customerNumber,
        SUM(quantityOrdered * priceEach) AS sales,
        (CASE
            WHEN SUM(quantityOrdered * priceEach) > 100000 then 'plantinum'
            WHEN SUM(quantityOrdered * priceEach) BETWEEN 10000 and 100000 then 'gold'
            WHEN SUm(quantityOrdered * priceEach) < 10000 then 'silver'
        END) AS customerGroup
    FROM
        orderdetails
    JOIN orders
    USING(orderNumber)
    WHERE YEAR(shippeddate) = 2003
    GROUP BY
        customerNumber
    ORDER BY 
        customerGroup DESC) as customerGroupTable
GROUP BY customerGroup
ORDER BY total DESC
    ";

require('FILE/printdata.php');

$conn->close();
?>