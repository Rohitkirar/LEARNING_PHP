<?php 
require_once('FILE/connection.php');

echo '<HR>EXAMPLE 1 :MySQL EXCEPT operator allows you to retrieve rows from one query that do not appear in another query. <BR>';

$sql  = 
"SELECT lastName FROM Employees
EXCEPT
SELECT contactlastName FROM customers
";

require('FILE/printdata.php');

echo '<HR>EXAMPLE 2 :ses the EXCEPT operator to find the first names that appear in the customers table but do not appear in the employees  <BR>';

$sql  = 
"SELECT firstName
FROM employees
EXCEPT
SELECT contactfirstName
FROM customers
";

require('FILE/printdata.php');

echo '<HR>EXAMPLE 3 :To sort the result set returned by the EXCEPT operator, you use the ORDER BY clause.  <BR>';

$sql  = 
"SELECT firstName , lastName FROM Employees
EXCEPT
SELECT contactfirstName , contactlastName FROM customers
ORDER BY firstName
";

require('FILE/printdata.php');
// IT doesn't support by mysql
// echo '<HR>EXAMPLE 4 :EXCEPT operator with the ALL option to retain duplicate first names in the result set:.  <BR>';

// $sql  = 
// "SELECT firstName , lastName FROM Employees
// EXCEPT
// SELECT contactfirstName , contactlastName FROM customers
// ORDER BY firstName
// ";

// require('FILE/printdata.php');

$conn->close();
?>