<?php 
require_once('FILE/connection.php');

echo "<HR>EXAMPLE : 1 when creating table we can use Generated Always as in a column to generate it value by expression <BR>";

$sql = 
"CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    full_name VARCHAR(50) GENERATED ALWAYS AS (CONCAT(first_name , ' ' , last_name)),
    email VARCHAR(100) NOT NULL
);
";


require('FILE/printdata.php');

echo "<HR>EXAMPLE : 1.1 output  id and generated col fullName<BR>";

$sql = 
"SELECT id , full_name FROM contacts;
";


require('FILE/printdata.php');


echo "<HR>EXAMPLE : 2 Also use GENEREATEd always as expression when adding a col using alter table add column to generate col value<BR>";

$sql = 
"ALTER TABLE products 
ADD Column stockValue DECIMAL(10,2)
GENERATED ALWAYS AS (quantityInStock*buyPrice) STORED;
";


require('FILE/printdata.php');


echo "<HR>EXAMPLE : 3 OUTPUT of id , product name and genearted col stock Value<BR>";

$sql = 
"
SELECT productCode , 
		productName ,
        stockValue
FROM products;
";


require('FILE/printdata.php');
?>