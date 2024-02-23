<?php 
require_once('FILE/connection.php');

//A self join is a regular join, but the table is joined with itself.

ECHO "<HR> EXAMPLE : 1 : The table employees stores not only employees’ data but also the organization’s data. It uses the reportsto column to determine the manager id of an employee. <BR>" ;

$sql = 
"SELECT e.employeeNumber , 
    CONCAT(e.firstName , ' ' , e.lastName) as EmpfullName, 
    e.reportsTo,t.employeeNumber as trainerNumber,
    CONCAT(t.firstName , ' ' , t.lastName) as TrainerName 
FROM employees AS e
JOIN employees AS t
ON t.employeeNumber = e.reportsTo ;
";

require('FILE/printdata.php');


ECHO "<HR> EXAMPLE : 2 : compare the trainer and the employee current jobtitle<BR>" ;

$sql = 
"SELECT e.employeeNumber , 
    CONCAT(e.firstName , ' ' , e.lastName) as EmpFullName, 
    e.jobTitle,
    t.employeeNumber as TrainerNumber , 
    CONCAT(t.firstName , ' ' , t.lastName) as TrainerFullName , 
    t.jobtitle
FROM employees AS e 
JOIN employees AS t
ON e.reportsTo  = t.employeeNumber;
";

require('FILE/printdata.php');


ECHO "<HR> EXAMPLE : 3 : <BR>" ;

$sql = 
"SELECT 
IFNULL(CONCAT(m.firstName , ' ' , m.lastName), 'TOP MANAGER') AS 'Manager',
CONCAT(e.firstName , ' ' , e.lastName) AS 'Direct Report TO '
FROM employees e 
LEFT JOIN employees m
ON m.employeeNumber = e.reportsto
ORDER by manager;
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE : 4 : using self join to compare successive rows within the same table<BR>" ;

$sql = 
"SELECT c1.city,
    c1.customerName,
    c2.customerName as customerName2
FROM
    customers c1
INNER JOIN customers c2 
ON c1.city = c2.city
AND c1.customername > c2.customerName
ORDER BY
c1.city;
";

require('FILE/printdata.php');


ECHO "<HR> EXAMPLE : 5 : another way of using self join without using join : - <BR>" ;

$sql = 
"SELECT 
    e.employeeNumber , 
    CONCAT(e.firstName , ' ' , e.lastName) as EmpFullName, 
    e.jobTitle,
    t.employeeNumber as TrainerNumber , 
    CONCAT(t.firstName , ' ' , t.lastName) as TrainerFullName , 
    t.jobtitle
FROM 
    employees AS e ,
    employees AS t
WHERE 
    e.reportsTo  = t.employeeNumber;
";

require('FILE/printdata.php');

$conn->close();
?>