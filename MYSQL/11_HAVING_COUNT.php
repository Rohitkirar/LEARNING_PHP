<?php 
require_once('FILE/connection.php');

// Use the HAVING COUNT clause to filter groups by the number of items in each group.

ECHO "<HR>EXAMPLE  : uses the HAVING clause with the COUNT function to get the customers who placed more than four orders:<BR>" ;

$sql = 
"SELECT 
    c.customerNumber,
    c.customerName,
    COUNT(orderNumber) as totalOrder
FROM
    customers AS c 
JOIN
    orders AS  o 
USING
    (customerNumber)
GROUP BY
    CustomerNumber
HAVING 
    -- totalOrder > 4  -- it is not working in sql
    COUNT(orderNumber) > 4
";

require('FILE/printdata.php');



$conn->close();
?>