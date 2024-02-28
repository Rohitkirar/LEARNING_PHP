<?php 
require_once('FILE/connection.php');

$conn = mysqli_connect('localhost' , 'root' , '' , 'hr');

ECHO "<HR>EXAMPLE : 1  defining a single column primary key<BR>";

$sql = 
"CREATE TABLE products(
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 2 INSERTING DATA <BR>";

$sql = 
"INSERT INTO products(id , name)
VALUES (1, 'ROHIT KIRAR'),
        (2, 'SOham Bharti'),
        (3, 'Hritik Yemde'),
        (4, 'akash Patel') ;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :  3 -- error duplicate keys<BR>";

$sql = 
"INSERT INTO products(id,name)
VALUES (1 , 'HARIOM ') ;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :  OUTPUT <BR>";

$sql = 
"SELECT * FROM products;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 4 defining single col primary key with auto increment constraint<BR>";

$sql = 
"CREATE TABLE product1(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 5  INSERTING DATA IN PRODUCT1<BR>";

$sql = 
"INSERT INTO product1(name)
VALUES  ('laptop'),
        ('smartphone'),
        ('wireless Headphones');
";

require('FILE/printdata.php');



ECHO "<HR>EXAMPLE :  OUTPUT OF PRODUCT1 TABLE<BR>";

$sql = 
"SELECT * FROM product1;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 6 defining multi-column primary key<BR>";

$sql = 
"CREATE TABLE customers(
    id iNT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255)  NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 7 The favorites table has a primary that consists of two columns customer_id and product_id. <BR>";

$sql = 
"CREATE TABLE favourites(
    customer_id INT,
    product_id INT,
    favourite_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(customer_id , product_id)
) ;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 8 Adding a primary key to a table using alter <BR>";

$sql = 
"CREATE TABLE tags(
    id INT ,
    name VARCHAR(30) NOT NULL
)
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 9  primary key to a table using alte<BR>";

$sql = 
"ALTER TABLE tags
ADD PRIMARY KEY(id);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : 10  -- Removing the primary Key FROM table<BR>";

$sql = 
"ALTER TABLE tags 
DROP PRIMARY KEY;
";

require('FILE/printdata.php');

$conn->close();
?>