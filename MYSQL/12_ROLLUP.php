<?php 

require_once('FILE/connection.php');

echo "<HR>EXAMPLE 1 : rollup implementation <BR>";

$sql = 
"SELECT 
    productline,
    SUM(quantityOrdered * priceEach) as total
FROM 
    orderdetails
JOIN
    products
USING
    (productCode)
GROUP BY 
    productline with ROLLUP
";

require('FILE/printdata.php');


echo "<HR>EXAMPLE 2 : using rollup with two columns<BR>";

$sql = 
"SELECT 
    productline,
    YEAR(orderdate) as year,
    SUM(quantityOrdered * priceEach)
FROM 
    products
JOIN 
    orderdetails as od
USING
    (productCode)
JOIN 
    orders
USING 
    (orderNumber)
GROUP BY 
    productLine, year with ROLLUP;
";

require('FILE/printdata.php');


echo "<HR>EXAMPLE 3 : using rollup with two columns<BR>";

$sql = 
"SELECT 
    productline,
    YEAR(orderdate) as year,
    SUM(quantityOrdered * priceEach)
FROM 
    products
JOIN 
    orderdetails as od
USING
    (productCode)
JOIN 
    orders
USING 
    (orderNumber)
GROUP BY 
    year , productline with ROLLUP;
";

require('FILE/printdata.php');
//not working
// The GROUPING() function returns 1 when NULL occurs in a supper-aggregate row, otherwise, it returns 0.
// The GROUPING() function can be used in the select list, HAVING clause, and (as of MySQL 8.0.12 ) ORDER BY clause.

echo "<HR>EXAMPLE 4 : <BR>";

// $sql = 
// "SELECT 
//     productline,
//     YEAR(orderdate) as year,
//     SUM(quantityOrdered * priceEach) as total,
//     GROUPING(productline),
//     GROUPING(year)
// FROM
//     orders
// JOIN 
//     orderdetails
// USING
//     (orderNumber)
// JOIN
//     products
// USING
//     (productCode)
// GROUP BY
//     productline,
//     year
//     WITH ROLLUP
// ";

require('FILE/printdata.php');

echo '<HR>EXAMPLE  : <BR>';

$sql = 
"SELECT 
    orderNumber,
    SUM(quantityOrdered*priceEach) AS totalamount
FROM
    orderdetails
GROUP BY orderNumber
UNION ALL
SELECT 
    NULL,
    SUM(quantityOrdered*priceEach) As totalamount
FROM 
    orderdetails
";

require('FILE/printdata.php');
?>