<?php 
require_once('FILE/connection.php');

//Assign the AUTO_INCREMENT attribute to a column to instruct MySQL to automatically generate unique values for that column.

ECHO "<HR>EXAMPLE 1 : creating table contacts <BR>";

$sql = 
"CREATE TABLE IF NOT EXISTS contacts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(320) NOT NULL
);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 2 : INSERT ROW into contacts :  <BR>";

$sql = 
"INSERT INTO contacts (name , email)
VALUES('John Doe' , 'john.doe@mysqltutorial.org');
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 3 : INSERT MULTIPLE ROWs into contacts :  <BR>";

$sql = 
"INSERT INTO contacts (name , email)
VALUES('John Doe' , 'john.doe@mysqltutorial.org'),
	  ('John Doe' , 'john.doe@mysqltutorial.org'),
	  ('John Doe' , 'john.doe@mysqltutorial.org');
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 4 : output of data of contacts table <BR>";

$sql = 
"SELECT * FROM contacts;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 6 : SELECT LAST_INSERT_ID(); <BR>";

$sql = 
"SELECT LAST_INSERT_ID();
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 7 : ALTER TABLE contacts AUTO_INCREMENT = 10;<BR>";

$sql = 
"ALTER TABLE contacts AUTO_INCREMENT = 10;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 8 :inserting row ;<BR>";

$sql = 
"INSERT INTO contacts(name, email) 
VALUES('Bob Climo', 'bob.climo@mysqltutorial.org');
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 9 :creating table subscribers;<BR>";

$sql = 
"CREATE TABLE IF NOT EXISTS subscribers(
	email VARCHAR(320) NOT NULL UNIQUE
);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 10 :ALTER table add column;<BR>";

$sql = 
"ALTER TABLE subscribers ADD id INT AUTO_INCREMENT PRIMARY KEY;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 11 :output of subscriber table<BR>";

$sql = 
"INSERT INTO subscribers (email)
VALUES(  'john.doe@mysqltutorial.org'),
	  ('john1.doe@mysqltutorial.org'),
	  ( 'john2.doe@mysqltutorial.org');
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 12 :output of subscriber table<BR>";

$sql = 
"SELECT * FROM subscribers;;
";

require('FILE/printdata.php');

$conn->close();

?>