<?php 
require_once('FILE/connection.php');

ECHO "<HR> EXAMPLE  : Creating suppliers table <BR>";

$sql = 
"CREATE TABLE suppliers(
    supplierNumber INT AUTO_INCREMENT,
    supplierName VARCHAR(50) NOT NULL,
    phone VARCHAR(50) ,
    addressLine1 varchar(50),
    addressLine2 VARCHAR(50),
    city VARCHAR(50),
    state VARCHAR(50),
    postalCode VARCHAR(50),
    country VARCHAR(50),
    customerNumber INT,
    PRIMARY KEY(supplierNumber),
    CONSTRAINT uc_all
    UNIQUE(supplierName , phone , customerNumber)
);
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE  : finding customers details whose state is CA and country is USA <BR>";

$sql = 
"SELECT 
customerNumber,
customerName,
phone,
addressLine1,
addressLine2,
city,
state,
postalCode,
country
FROM customers
WHERE
country = 'USA' AND
state = 'CA';
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE  : Inserting data into suppliers table using select statement<BR>";

$sql = 
"INSERT INTO suppliers(
    supplierName ,
    phone,
    addressline1,
    addressline2,
    city,
    state,
    postalCode,
    country,
    customerNumber
)
SELECT 
    customerName,
    phone,
    addressline1,
    addressline2,
    city,
    state,
    postalCode,
    country,
    customerNumber
FROM
    customers
WHERE 
    country = 'USA' AND
    state = 'CA';
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE  : suppliers Table data<BR>";

$sql = 
"SELECT * FROM suppliers;
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE  : creating table stats <BR>";

$sql = 
"CREATE TABLE stats(
    totalproduct INT,
    totalCustomer INT,
    totalOrder INT,
    CONSTRAINT uc_all
    UNIQUE(totalproduct , totalcustomer , totalorder)
) ;
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE  : INSERTING DATA in stats table  <BR>";

$sql = 
"INSERT INTO stats (
    totalproduct,
    totalcustomer,
    totalorder
)
VALUES(
    (SELECT count(*) FROM products),
    (SELECT count(*) FROM customers),
    (SELECT count(*) FROM orders)
);
";

require('FILE/printdata.php');


ECHO "<HR> EXAMPLE  :ALTER TABLE stats ADD COLUMN total INT GENERATED ALWAYS AS (totalproduct + totalcustomer + totalorder);<BR>";

$sql = 
"ALTER TABLE stats 
ADD COLUMN total INT GENERATED ALWAYS AS (totalproduct + totalcustomer + totalorder);
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE  : output of stats table data <BR>";

$sql = 
"SELECT * FROM stats;
";

require('FILE/printdata.php');


// copy data of one table into another

ECHO "<HR> EXAMPLE  : CREATE TABLE customers2 LIKE customers;<BR>";

$sql = 
"CREATE TABLE customers2 LIKE customers;
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE  : INSERT INTO customers2 SELECT * FROM customers;<BR>";

$sql = 
"INSERT INTO customers2
SELECT * FROM customers;
";

require('FILE/printdata.php');

ECHO "<HR> EXAMPLE  : SELECT * FROM customers2;<BR>";

$sql = 
"SELECT * FROM customers2;
";

require('FILE/printdata.php');

// Please note that it’s possible to select rows in a table and insert them into the same table. In other words, 
// the table_name and another_table in the INSERT INTO ... SELECT statement can reference the same table.


?>