<?php 
require_once('FILE/connection.php');
$conn = mysqli_connect('localhost' , 'root' , '' , 'hr') ;


ECHO "<HR>EXAMPLE : 1  adding unique contraint when creating table :  <BR>";

$sql = 
    "CREATE TABLE suppliers(
    supplier_id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL ,
    phone VARCHAR(15) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL,
    PRIMARY KEY (supplier_id),
    CONSTRAINT uc_name_address 
    UNIQUE(name , address)  -- checks combination of this column uniqueness
);" ;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE : 2 adding unique contraint in existing col in table using ALTER TABLE statement:  <BR>";

$sql = 
"ALTER TABLE suppliers
ADD CONSTRAINT uc_city
UNIQUE(city);
" ;

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 3  DROP UNIQUE CONSTAINT syntax : DROP INDEX index_name ON table_name;  <BR>";

$sql = 
"DROP INDEX uc_city ON suppliers;
" ;

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 4  DROP UNIQUE CONSTAINT using alter statement ;  <BR>";

$sql = 
"ALTER TABLE suppliers
DROP INDEX uc_city;
" ;

require('FILE/printdata.php');


$conn->close();
?>