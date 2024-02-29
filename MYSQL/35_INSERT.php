<?php 
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE : 1 insert data into table mentionally column here<BR>";

$sql = 
"INSERT INTO customers_100 
(S_No , customer_id ,First_name , last_name , company , city , country , phone_1 , phone_2 , email , subscription_date , Website)
VALUES
('102' , 'hhhhh' ,  'Harsh' , 'Shrivastav' , 'quality quoisk' , 'bhopal' , 'India' ,
 1234 , 4321 , 'harsh123@gmail.com' , '01-02-2023' , 'www.harsh.com/' );
" ;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :  2  insert data into data without mention column externally <BR>";

$sql = 
"INSERT INTO customers_100 
VALUES
(101 , 'aaaaa' , 'ROHIT' , 'KIRAR' , 'SST' , 'BHOPAL' , 'bharat' ,  '12345' ,
 12321 , 'rk123@gmail.com' , '15-01-2023' , 'www.rk.com/') ;
" ;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :  output of customers_100 table only the added rows<BR>";

$sql = 
"SELECT * FROM customers_100 WHERE S_No > 100;
" ;

require('FILE/printdata.php');

$conn = mysqli_connect('localhost' , 'root' , '' , 'hr');

ECHO "<HR>EXAMPLE :  3 creating tasks table in hr database <BR>";

$sql = 
"CREATE TABLE IF NOT EXISTS tasks(
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    start_date DATE,
    due_date DATE,
    priority TINYINT NOT NULL DEFAULT 3,
    description TEXT
);
" ;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :  4 Insert data in tasks table <BR>";

$sql = 
"INSERT INTO tasks(title , priority)
VALUES ('Learn Mysql Insert statement' , 1);
" ;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :  5 Insert data in tasks table using default keyword <BR>";

$sql = 
"INSERT INTO tasks(title , priority)
VALUES ('understanding default keyword' ,Default);
" ;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :  6 inserting date in table <BR>";

$sql = 
"INSERT INTO tasks 
(title , start_date , due_date)
VALUES
    ('insert date into table' , '2018-01-09' , '2018-10-10');
" ;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :  7 validating date <BR>";

$sql = 
"INSERT INTO tasks
(title , start_date , due_date)
VALUES 
    ('validating date format' , '18/3/03' , '03/10/23');
" ;

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :  8 current_date to insert date <BR>";

$sql = 
"INSERT INTO tasks
(title , start_date , due_date)
VALUES ('using current_date fun' , CURRENT_DATE , null);
" ;

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :  8 output of tasks table<BR>";

$sql = 
"SELECT * FROM tasks;
" ;

require('FILE/printdata.php');

$conn->close();
?>