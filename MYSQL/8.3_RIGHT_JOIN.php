<?php 
require_once('FILE/connection.php');

Echo "<HR> EXAMPLE 1 : simple right join query <BR>";

$sql = 
"SELECT 
employeeNumber,
customerNumber
FROM
customers
RIGHT JOIN employees
ON salesRepEmployeeNumber = employeeNumber
ORDER BY customerNumber
LIMIT 30;
";


require('FILE/printdata.php');

Echo "<HR> EXAMPLE 2 find employees who are not incharge of any customer
: <BR>";    

$sql = 
"SELECT employeeNumber, CONCAT(firstName , ' ' ,lastName) as fullName,
customerNumber
FROM customers 
RIGHT JOIN employees
on customers.SalesRepEMployeeNumber = employeeNumber
AND customerNumber IS NULL
ORDER BY fullName;
";

require('FILE/printdata.php');


Echo "<HR> EXAMPLE 3 : find customerNumber who never order<BR>";    

$sql = 
"SELECT customerNumber , customerName , orderNumber , quantityOrdered , priceEach
FROM orderdetails
RIGHT JOIN 
orders USING(orderNumber)
RIGHT JOIN
customers USING(customerNumber)
WHERE orderNumber IS NULL;
";

require('FILE/printdata.php');


$conn -> close();
?>