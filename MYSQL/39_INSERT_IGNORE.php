<?php 
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE : 1 DROP TABLE IF EXISTS subscribers;<BR>";

$sql = 
"DROP TABLE IF EXISTS subscribers;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 2 CREATING Table subscribers  :<BR>";

$sql = 
"CREATE TABLE IF NOT EXISTS subscribers(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(130) NOT NULL UNIQUE
);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 3 INSERTING DATa :<BR>";

$sql = 
"INSERT INTO subscribers
(email)
VALUES 
('john.doe@gmail.com');
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :4 Duplicate entry 'john.doe@gmail.com' for key 'email':<BR>";

$sql = 
"INSERT INTO subscribers
(email)
VALUES 
('jane.smith@ibm.com'),
('john.doe@gmail.com'); --Duplicate entry 'john.doe@gmail.com' for key 'email'

";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :5 INSERT data using INSERT IGNORE to ignore duplicate value and add valid value<BR>";

$sql = 
"INSERT IGNORE INTO subscribers
(email)
VALUES  
('jane.smith@ibm.com'),
('john.doe@gmail.com');

";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 5 INSERT data using INSERT IGNORE<BR>";

$sql = 
"INSERT IGNORE INTO subscribers
(email)
VALUES  
('jane.smith@ibm.com'),
('roman.reign@gmail.com'),
('john.doe@gmail.com');
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :6 ADDING MORE column to table<BR>";

$sql = 
"ALTER TABLE subscribers
ADD COLUMN comment VARCHAR(10),
ADD COLUMN subscribe_at DATETIME;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :7 INSERTING DATA WITH INSERT IGNORE <BR>";

$sql = 
"INSERT IGNORE INTO subscribers
(email , comment , subscribe_at)
VALUES  
('jane.smith@ibm.com' , 'KEEPITUP' , CURRENT_DATE),
('roman.reign@gmail.com' , 'GOOD TO SEE' , NULL),
('john.doe@gmail.com', NULL , CURRENT_DATE),
('brock.lesnar@gmail.com' , 'BEAST' , CURRENT_DATE),
('rock@gmail.com' , 'PEOPLES CHAMP ROCK' , CURRENT_DATE);

";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :8 OUTPUT of subcribers Table <BR>";

$sql = 
"SELECT * FROM subscribers;
";

require('FILE/printdata.php');

?>