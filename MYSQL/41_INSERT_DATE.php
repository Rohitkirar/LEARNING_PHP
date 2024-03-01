<?php 
require_once('FILE/connection.php');

ECHO "<HR>QUERY 1 : DROP TABLE IF EXISTS events; <BR>";

$sql = 
"DROP TABLE IF EXISTS events;
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 2 : Creating table events <BR>";

$sql = 
"CREATE TABLE IF NOT EXISTS events(
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL
);
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 3 : Insert the data into events <BR>";

$sql = 
"INSERT INTO events 
(event_name , event_date)
VALUES 
('A' , '2023-10-29');
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 4 : INSERT INTO events (event_name , event_date) VALUES ('B' , '2024-02-30');  <BR>";

$sql = 
"INSERT INTO events
(event_name , event_date)
VALUES
('B' , '2024-02-30'); 
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 5 :  current_date() returns current date  <BR>";

$sql = 
"INSERT INTO events
(event_name , event_date)
VALUES
('C' , CURRENT_DATE());
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 6 :  to insert UTC_DATE() to INSERT
<BR>";

$sql = 
"INSERT INTO events
(event_name , event_date)
VALUES
('D' , UTC_DATE());
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 7 :  STR_TO_DATE('strdate' , 'format'); <BR>";

$sql = 
"INSERT INTO events 
(event_name , event_date)
VALUES
('E' , STR_TO_DATE('10/29/2022' , '%m/%d/%Y'));
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 8 : output of events table data; <BR>";

$sql = 
"SELECT * FROM events;
";

require('FILE/printdata.php');
?>