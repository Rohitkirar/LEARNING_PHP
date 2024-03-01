<?php 
require_once('FILE/connection.php');

$conn = mysqli_connect('localhost' , 'root' , '' , 'test');

ECHO "<HR>EXAMPLE : 1 DROPING TABLE IF ALREADING EXISTS <BR>";

$sql = 
"DROP TABLE IF EXISTS employees;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 2 CREATING NEW TABLE <BR>";

$sql = 
"CREATE TABLE IF NOT EXISTS  employees(
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    salary DECIMAL(10,2) NOT NULL,
    bonus DECIMAL(10,2) DEFAULT 0
);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 3 INSERTING Date TO TABLE <BR>";

$sql = 
"INSERT INTO employees 
    (id , name , age , salary)
VALUES
    (1 , 'Jane Doe' , 25 , 120000),
    (2, 'John Cena' , 20 , 90000 );
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 4 OUTPUT TABLE DATA <BR>";

$sql = 
"SELECT * FROM employees;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 5   -- Duplicate entry '1' for key 'PRIMARY' ERROR <BR>";

$sql = 
"INSERT INTO employees
(id , name , age , salary) 
VALUES  
(1 , 'Jane Smith' , 26 , 130000);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 6  INSERTING SINGLE value in table with ON DUPLICATE KEY UPDATE <BR>";

$sql = 
"INSERT INTO employees
(id , name , age , salary)
VALUES
(1 , 'jane Doe' , 26 , 130000) 
ON DUPLICATE KEY UPDATE
name = 'jane Doe',
age = 26,
salary = 130000;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :  7 INSERTING MULTIPLE values in table with ON DUPLICATE KEY UPDATE <BR>";

$sql = 
"INSERT INTO employees
(id , name , age , salary)
VALUES  
(1 , 'JANE DOE' , 30 , 200000),
(2, 'ROMAN REIGN' , 36 , 1200000)
ON DUPLICATE KEY UPDATE
name = VALUES(name),
age = VALUES(age),
salary = VALUES(salary);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 8 OTHER EXAMPLE INSERTING MULTIPLE values in table with ON DUPLICATE KEY UPDATE <BR>";

$sql = 
"INSERT INTO employees
(id , name , age , salary)
VALUES
(1 , 'JOHN CENA' , 50 , 1000000),
(3 , 'BROCK LESNAR' , 48 , 2000000),
(4 , 'Seth Rollins' , 34 , 500000),
(2 , 'Roman Reign' , 40 , 1500000)
ON DUPLICATE KEY UPDATE
name = VALUES(name),
age = VALUES(age),
salary = VALUES(salary);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 9 OUTPUT TABLE DATA <BR>";

$sql = 
"SELECT * FROM employees;
";

require('FILE/printdata.php');
?>