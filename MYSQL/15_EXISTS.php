<?php 
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE 1 : To get customer details who never ordered using subquery and exists() <BR>" ;

$sql = 
"SELECT 
        customerNumber,
        customerName
FROM
        customers
WHERE 
    NOT EXISTS(
        SELECT 1 
        FROM orders
        WHERE orders.customerNumber = customers.customerNumber
    );
";
require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 2 : EXISTS operator to find the customer who has at least one order:<BR>" ;

$sql = 
"SELECT 
    customerNumber,
    customerName
FROM
    customers
WHERE 
    EXISTS(
        SELECT 1 
        FROM orders
        WHERE orders.customerNumber = customers.customerNumber
    )
LIMIT 20
";
require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 3 :Suppose that you have to update the phone extensions of the employees who work at the office in San Francisco.<BR>" ;

$sql = 
"SELECT 
    employeeNumber,
    firstName,
    lastName,
    extension
FROM employees
WHERE 
        EXISTS(
            SELECT 1 FROM offices
            WHERE employees.officeCode = offices.officeCode 
            AND city = 'San Francisco'
            )
";
require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 4 :This example adds the number 1 to the phone extension of employees who work at the office in San Francisco:<BR>" ;

$sql = 
"UPDATE employees
SET
    extension = CONCAT(extension , '1')
WHERE 
        EXISTS(
            SELECT 1 FROM offices
            WHERE employees.officeCode = offices.officeCode 
            AND city = 'San Francisco'
            )
";




ECHO "<HR>EXAMPLE 5 :uppose that you want to archive customers who don’t have any sales orders in a separate table. <BR>" ;

$sql = 
"SELECT * 
FROM
        customers
WHERE
        NOT EXISTS(
            SELECT 1
            FROM orders
            WHERE orders.customerNumber = customers.customerNumber
        )
";

require('FILE/printdata.php');

// MySQL EXISTS operator vs. IN operator

ECHO "<HR>EXAMPLE 6 :To find the customer who has placed at least one order, you can use the IN operator as shown in the following query: <BR>" ;

$sql = 
"SELECT * 
FROM customers
WHERE
customerNumber IN (
    SELECT 
        orders.customerNumber FROM orders
    WHERE 
        orders.customerNumber = customers.customerNumber
)
LIMIT 20
";

require('FILE/printdata.php');

$conn->close();
?>