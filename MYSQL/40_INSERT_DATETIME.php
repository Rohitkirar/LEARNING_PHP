<?php
require_once('FILE/connection.php');

// Use the datetime value with the format 'YYYY-MM-DD HH:MM:SS' to insert into a DATETIME column

ECHO "<HR> QUERY : 1  droping table if already exists <BR>";

$sql = 
"DROP TABLE IF EXISTS events;
";

require('FILE/printdata.php');

ECHO "<HR> QUERY 2 : Creating table events  <BR>";

$sql = 
"CREATE TABLE IF NOT EXISTS events(
    id INT auto_increment PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_time DATETIME NOT NULL
);
";

require('FILE/printdata.php');

ECHO "<HR> QUERY 3 : USING str_to_date() to pass string as date in datetime col  <BR>";

$sql = 
"INSERT INTO events
(event_name , event_time)
VALUES  
('MYsql party' , STR_TO_DATE('10/28/2023 20:04:34', '%m/%d/%Y %H:%i:%s'));
";

require('FILE/printdata.php');

ECHO "<HR> QUERY 4 : USING without str_to_date() to pass string as date in datetime col  <BR>";

$sql = 
"INSERT INTO events
(event_name , event_time)
VALUES
('A' , '2023-12-23 23:11:32');
";

require('FILE/printdata.php');

ECHO "<HR> QUERY 5 : INSERT INTO events (event_name , event_time) VALUES ('B' , '2023-12-23');<BR>";

$sql = 
"INSERT INTO events
(event_name , event_time)
VALUES
('B' , '2023-12-23');
";

require('FILE/printdata.php');

ECHO "<HR> QUERY 6 : INSERT INTO events (event_name , event_time) VALUES ('B' , '2023/12/23');<BR>";

$sql = 
"INSERT INTO events
(event_name , event_time)
VALUES
('B' , '2023/12/23');
";

require('FILE/printdata.php');

ECHO "<HR> QUERY 7 : INSERT INTO events (event_name , event_time) VALUES ('B' , '23/05/2023');<BR>";

$sql = 
"INSERT INTO events
(event_name , event_time)
VALUES
('B' , '23/05/2023');
";

require('FILE/printdata.php');

ECHO "<HR> QUERY 8 : INSERT INTO events (event_name , event_time) VALUES ('B' , STR_TO_DATE('23/05/2023' , '%d/%m/%Y'));<BR>";

$sql = 
"INSERT INTO events
(event_name , event_time)
VALUES
('B' , STR_TO_DATE('23/05/2023' , '%d/%m/%Y'));
";

require('FILE/printdata.php');

ECHO "<HR> QUERY 9 : output of events table<BR>";

$sql = 
"SELECT * FROM events;
";

require('FILE/printdata.php');
?>