<?php 
require_once('FILE/connection.php');

echo "<HR>EXAMPLE 1 <BR>";

$sql = "SELECT orderNumber as 'Order no.',
             SUM(priceEach * quantityOrdered) Total
        FROM orderdetails
        GROUP BY orderNumber
        Having Total > 60000;
        ";

require("FILE/printdata.php");

echo "<HR>EXAMPLE 2 <BR>";

$sql = "SELECT  CONCAT(e.firstname, ' ' , e.lastname) as fullName
        FROM employees as e 
        WHERE firstname LIKE 'G%' OR firstName like 'B%'
        ORDER BY fullName DESC ;
        ";

require("FILE/printdata.php");


echo "<HR>EXAMPLE 3 <BR>";

$sql = "SELECT customerName , 
                COUNT(o.orderNumber) as totalOrders
        FROM customers as c
        INNER JOIN orders as o 
        ON c.customerNumber = o.customerNumber
        GROUP BY customerName
        HAVING totalOrders > 10 
        ORDER BY totalOrders DESC
        ";

require("FILE/printdata.php");
?>
<!-- 
    MySQL supports two kinds of aliases: column aliases and table aliases.
    n MySQL, you use column aliases to assign a temporary name to a column in the query’s result set.

    For example, column names sometimes are so technical that make the query’s output very difficult to understand. 
    To give a column a descriptive name, you can use a column alias.
 
    Because the AS keyword is optional, you can omit it in the statement. 
    Note that you can also assign an expression an alias.

    Once you assign an alias to a table, 
    you can reference a table column using the table alias like this:


-->