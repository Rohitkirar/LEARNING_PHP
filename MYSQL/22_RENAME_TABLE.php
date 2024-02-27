<?php 
// Use the RENAME TABLE or ALTER TABLE statement to rename a table.

require_once('FILE/connection.php');
$conn = mysqli_connect('localhost' , 'root' , '' ,'hr');
ECHO "<HR>EXAMPLE 1 : <BR>";

$sql = 
'RENAME TABLE 
    departments TO depts,
    employees TO peoples;
';

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : <BR>";

$sql = 
'ALTER TABLE departments RENAME TO depts;
';

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : <BR>";

$sql = 
'ALTER TABLE employees RENAME TO peoples;
';

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 2 : <BR>";

$sql = 
'RENAME TABLE 
    depts TO departments,
    peoples TO employees;
';

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 3 : <BR>";

$sql = 
'SELECT id , first_name , last_name , dept_name
FROM employees
JOIN
departments
USING(department_id);
';

require('FILE/printdata.php');

$conn->close();

// If you rename the departments table, all the foreign keys that reference the departments table will not be automatically updated. In such cases, you must drop and recreate the foreign keys manually.

?>