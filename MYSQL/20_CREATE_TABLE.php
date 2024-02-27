<?php 
require_once('FILE/connection.php');

echo "<HR>EXAMPLE 1 : Use CREATE TABLE statement to create a new table. <BR>";

$sql = 
"CREATE TABLE tasks (
	id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    start_date DATE,
    end_date DATE
);
";

require('FILE/printdata.php');

echo "<HR>EXAMPLE 2 : IF table already present it generate error so always use IF NOT EXISTS  <BR>";

$sql = 
"CREATE TABLE IF NOT EXISTS tasks(
	id INT ,
    title char,
    date DATE
);
";

require('FILE/printdata.php');

echo "<HR>EXAMPLE 3 : must specify one col to create table otherwise it generate an error <BR>";

$sql = 
"CREATE TABLE task2;
";

require('FILE/printdata.php');

echo "<HR>EXAMPLE 4 :Creating a table with a foreign key example <BR>";

$sql = 
"CREATE TABLE IF NOT EXISTS checklists(
	id INT ,
    task_id INT,
    title VARCHAR(255) NOT NULL,
    is_completed BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY(id , task_id),
    FOREIGN KEY(task_Id)
		REFERENCES tasks(id)
);
";

require('FILE/printdata.php');
?>