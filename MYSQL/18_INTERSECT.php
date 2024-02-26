<?php 
require_once('FILE/connection.php');

//INTERSECT operator is a set operator that returns the common rows of two or more queries.

ECHO "<HR>EXAMPLE 1 : query uses the INTERSECT operator to find the common first names of customers and employees: <BR>";

$sql = 
"SELECT 
    firstName
FROM
    employees
INTERSECT
SELECT 
    contactfirstName
FROM 
    customers

";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 2 : USING INTERSECTION WITH ORDER BY<BR>";

$sql = 
"SELECT 
    firstName
FROM
    employees
INTERSECT
SELECT 
    contactfirstName
FROM 
    customers
ORDER BY firstName
";

require('FILE/printdata.php');
?>