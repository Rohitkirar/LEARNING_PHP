<?php 

session_start();

require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE <BR>";

$sql = 
"CREATE TABLE messages(
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(100) NOT NULL
);
";

require('FILE/printdata.php');


?>