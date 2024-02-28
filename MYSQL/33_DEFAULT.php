<?php 
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE 1 :SET  default constrait example <BR>";

$sql = 
"CREATE TABLE cart_items(
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DEC(5,2) NOT NULL,
    sales_tax DEC(5,2) NOT NULL DEFAULT 0.1
);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 2 :descibe table details <BR>";

$sql = 
"DESC cart_items;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 3 :INSERT INTO cart_items(name , quantity , price) VALUES ('keyboard' , 1 , 50);<BR>";

$sql = 
"INSERT INTO cart_items(name , quantity , price)
VALUES ('keyboard' , 1 , 50);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE  4 :INSERT INTO cart_items(name, quantity , price , sales_tax) VALUES ('Battery' , 4, 0.25 , DEFAULT); <BR>";

$sql = 
"INSERT INTO cart_items(name, quantity , price , sales_tax)
VALUES ('Battery' , 4, 0.25 , DEFAULT);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE  5 :OUTPUT <BR>";

$sql = 
"SELECT * FROM cart_items;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE  6 : ALTER TABLE cart_items ALTER COLUMN quantity SET DEFAULT 1<BR>";

$sql = 
"ALTER TABLE cart_items
ALTER COLUMN quantity
SET DEFAULT 1;

";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 7 :descibe table details <BR>";

$sql = 
"DESC cart_items;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 8 : INSERT INTO cart_items(name , price , sales_tax) VALUES('Maintenance Services' , 30 , 0 ); <BR>";

$sql = 
"INSERT INTO cart_items(name , price , sales_tax)
VALUES('Maintenance Services' , 30 , 0 );
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 9 : ALTER TABLE cart_items ALTER COLUMN quantity DROP DEFAULT;<BR>";

$sql = 
"ALTER TABLE cart_items
ALTER COLUMN quantity DROP DEFAULT;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE  10 :OUTPUT <BR>";

$sql = 
"SELECT * FROM cart_items;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE 11 :descibe table details <BR>";

$sql = 
"DESC cart_items;
";

require('FILE/printdata.php');

$conn->close();
?>