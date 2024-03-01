<?php 
require_once('FILE/connection.php');

echo "<HR>QUERY 1 : droping table if exists cities <BR>";

$sql = 
"DROP TABLE IF EXISTS cities;
";

require('FILE/printdata.php');

echo "<HR>QUERY 2 : Creating table new cities<BR>";

$sql = 
"CREATE TABLE cities(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    population INT NOT NULL
);
";

require('FILE/printdata.php');

echo "<HR>QUERY 3 : Inserting data into cities<BR>";

$sql = 
"INSERT INTO cities 
(name , population)
VALUES
('New York' , 100000),
('Los Angeles' , 300000),
('San Diego' , 200000);
";

require('FILE/printdata.php');

echo "<HR>QUERY 4 : output of cities table<BR>";

$sql = 
"SELECT * FROM cities;
";

require('FILE/printdata.php');


echo "<HR>QUERY 5 : use the REPLACE statement to update the population of the Los Angeles city to 370000.<BR>";

$sql = 
"REPLACE INTO cities
(id , population)
VALUES
(2 , 370000);
";

require('FILE/printdata.php');

echo "<HR>QUERY  : output of cities table<BR>";

$sql = 
"SELECT * FROM cities;
";

require('FILE/printdata.php');

echo "<HR>QUERY 6 : REPLACE statement to update a row<BR>";

$sql = 
"REPLACE INTO cities
SET id = 4,
    name = 'Roman' ,
    population = 150000;
";

require('FILE/printdata.php');


echo "<HR>QUERY  : output of cities table<BR>";

$sql = 
"SELECT * FROM cities;
";

require('FILE/printdata.php');

echo "<HR>QUERY 7 : REPLACE statement to update a row<BR>";

$sql = 
"REPLACE INTO cities
SET id = 4,
    name = 'Roman' ,
    population = 170000;
";

require('FILE/printdata.php');


echo "<HR>QUERY  : output of cities table<BR>";

$sql = 
"SELECT * FROM cities;
";

require('FILE/printdata.php');

echo "<HR>QUERY 8 : MYSQL REPLACE to insert data using select STATEMENT<BR>";
$sql = 
"REPLACE INTO cities
(name , population)
SELECT 
name ,
population
FROM cities
Where id = 1;
";

require('FILE/printdata.php');


echo "<HR>QUERY  : output of cities table<BR>";

$sql = 
"SELECT * FROM cities;
";

require('FILE/printdata.php');


?>