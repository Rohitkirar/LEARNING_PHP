<?php 
// MySQL allows a table to have up to one auto-increment column and that column must be defined as a key.
require_once('FILE/connection.php');

$conn = mysqli_connect('localhost' , 'root' , '' , 'hr');

ECHO "<HR>EXAMPLE 1 : specify the AFTER col position to add col<BR>";

$sql = 
"ALTER TABLE vendors
ADD COLUMN phone VARCHAR(15) NOT NULL AFTER name;
" ;


require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 2 : to add col at last<BR>";

$sql = 
"ALTER TABLE vendors
ADD COLUMN vendor_group INT NOT NULL;
" ;


require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 3 : multiple col add in vendors<BR>";

$sql = 
"ALTER TABLE vendors
ADD COLUMN email VARCHAR(255) NOT NULL,
ADD COLUMN hourly_rate decimal(10 , 2) NOT NULL;
" ;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 4 : ERROR : duplicate column Name<BR>";

$sql = 
"ALTER TABLE vendors
ADD COLUMN name varchar(40) NOT NULL FIRST; 
" ;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 5 :MySQL allows a table to have up to one auto-increment column and that column must be defined as a key.<BR>";

$sql = 
"ALTER TABLE contacts 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY;
" ;

require('FILE/printdata.php');

// The output indicates that MySQL automatically generates value for the id column.

$conn->close();
?>