<?php 
require_once('FILE/connection.php');

// Use the MySQL UPDATE JOIN  with the INNER JOIN  or LEFT JOIN  clauses to perform cross-table updates.
$conn = mysqli_connect('localhost' , 'root' , '' , 'hr');

ECHO "<HR>EXAMPLE : 1 DROP TABLE IF EXISTS employees; <BR>";

$sql = 
"DROP TABLE IF EXISTS employees;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 2 DROP TABLE IF EXISTS merits; <BR>";

$sql = 
"DROP TABLE IF EXISTS merits;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 3 Creating table merits <BR>";

$sql = 
"CREATE TABLE merits(
    performance INT PRIMARY KEY,
    percentage DEC(10,2) NOT NULL
);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 4 Creating table employees <BR>";

$sql = 
"CREATE TABLE employees (
    id INT auto_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    performance INT DEFAULT NULL,
    salary DEC(10,2) DEFAULT NULL,
    CONSTRAINT fk_emp
    FOREIGN KEY (performance)
    REFERENCES merits(performance) 
);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 5 Inserting values in merits <BR>";

$sql = 
"INSERT INTO merits
(performance , percentage)
VALUES
(1, 0),
(2, 0.01),
(3, 0.03),
(4, 0.05),
(5, 0.8);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 6 Inserting values in employees <BR>";

$sql = 
"INSERT INTO employees
(name , performance , salary)
VALUES
('Mary Doe' , 1 , 50000),
('Cindy Smith' , 3 , 65000),
('Sue Greenspan' , 4 , 75000),
('Grace Dell' , 5 , 125000),
('Nancy Johnson' , 3 , 85000),
('John Doe' , 2 , 45000),
('Lily Bush' , 3 , 55000);
";

require('FILE/printdata.php');
ECHO "<HR>EXAMPLE : output of employees table <BR>" ;

$sql = 
"SELECT * FROM employees;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 7 Suppose you want to increment each employee’s salary by a percentage based on their performance.<BR>";

$sql = 
"UPDATE 
employees 
JOIN
merits 
USING
(performance)
SET salary = salary + (salary*percentage);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : output of employees table <BR>" ;

$sql = 
"SELECT * FROM employees;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 8 thinks company hires new intern <BR>" ;

$sql = 
"INSERT INTO employees 
(name , salary)
VALUES
('Roman Reign' , 18000),
('CM PUNK' , 12000);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : output of employees table <BR>" ;

$sql = 
"SELECT * FROM employees;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 9 employee salary hike based on their performance and for new intern hike 1% in their salay <BR>" ;

$sql = 
"UPDATE 
employees 
LEFT JOIN
merits
USING
(performance)
SET salary = salary + (salary * COALESCE(percentage , 0.01));
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : output of employees table <BR>" ;

$sql = 
"SELECT * FROM employees;
";

require('FILE/printdata.php');
?>