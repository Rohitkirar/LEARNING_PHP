<?php 
require_once('FILE/connection.php');
$conn = mysqli_connect('localhost' , 'root' , '' , 'fkdemo');


echo "<HR> EXAMPLE 1 : -- RESTRICT & NO ACTION <BR>";

$sql = 
"CREATE TABLE categories(
    categoryId INT AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(100) NOT NULL
);
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 2 Because we don’t specify any ON UPDATE and ON DELETE clauses, the default action is RESTRICT for both update and delete operations. <BR>";

$sql = 
"CREATE TABLE products(
    productId INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(100) NOT NULL,
    categoryId INT,
    FOREIGN KEY (categoryId)
        REFERENCES categories(categoryId)
);
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 3 iNSERT query in categories :  <BR>";

$sql = 
"INSERT INTO categories(categoryName)
VALUES ('SmartPhone'),
		('SmartWatch');
";

require('FILE/printdata.php');

echo "<HR> EXAMPLE 4 iNSERT query in products :  <BR>";

$sql = 
"INSERT INTO products(productName , categoryId)
VALUES ('iphone' , 1 );
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE  5 error cannot add row value not exist in parent table<BR>";

$sql = 
"INSERT INTO products(productName , categoryId)
VALUES ('Samsung' , 3);
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 6 OUTPUT OF Categories and product table by combine <BR>";

$sql = 
"SELECT * FROM categories  JOIN products  USING(categoryId) ;
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE  8 CASCADE action <BR>";

$sql = 
"CREATE TABLE products1(
	productId INT AUTO_INCREMENT PRIMARY KEY,
    productName varchar(100) not null,
    categoryId INT NOT NULL,
    CONSTRAINT fk_category
    FOREIGN KEY (categoryId)
		REFERENCES categories(categoryId)
		ON DELETE CASCADE
        ON UPDATE CASCADE
);
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 9  insert data in products1  <BR>";

$sql = 
"INSERT INTO products1(productName , categoryId)
VALUES ('iphone' , 1 ),
		('GALAXY NOTE' , 1),
        ('APPle Watch' , 2),
        ('Samsung GAlaxy Watch' , 2);
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 10  <BR>";

$sql = 
"UPDATE categories
SET categoryId = 10 
WHERE categoryId = 1 ;
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 11 <BR>";

$sql = 
"DELETE FROM categories
WHERE categoryId = 2;
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 12 -- 3) SET NULL action <BR>";

$sql = 
"CREATE TABLE categories2(
	categoryId INT AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(100) NOT NULL
);
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 13 <BR>";

$sql = 
"CREATE TABLE products2(
	productId INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(100) NOT NULL,
    categoryId INT,
    CONSTRAINT fk_category
	FOREIGN KEY (categoryId)
	REFERENCES categories2(categoryId)
    ON DELETE SET NULL
    ON UPDATE SET NULL
    );
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 14  <BR>";

$sql = 
"INSERT INTO categories2(categoryName)
VALUES('smartphone'),
		('smartwatch');
";

require('FILE/printdata.php');


echo "<HR> EXAMPLE 15 <BR>";

$sql = 
"INSERT INTO products2(productName , categoryId)
VALUES ('iphone' , 1 ),
		('Galaxy Note' , 1),
        ('APple Watch' , 2),
        ('Samsung Galaxy Watch' , 2);
";

require('FILE/printdata.php');

echo "<HR> EXAMPLE 16 <BR>";

$sql = 
"UPDATE categories2
SET categoryId = 10 
WHERE categoryId = 1 ;
";

require('FILE/printdata.php');

echo "<HR> EXAMPLE 17 Delete the categoryId 2 from the categories table: <BR>";

$sql = 
"DELETE FROM categories2
WHERE categoryId = 2;
";

require('FILE/printdata.php');

echo "<HR> EXAMPLE 18  To drop a foreign key constraint, you use the ALTER TABLE statement: <BR>";

$sql = 
"ALTER TABLE products 
DROP FOREIGN KEY fk_category;

";

require('FILE/printdata.php');

$conn->close();
?>
