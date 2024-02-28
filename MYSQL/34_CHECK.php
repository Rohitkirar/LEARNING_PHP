<?php 
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE : <BR>";

$sql = 
"CREATE TABLE parts(
    part_no VARCHAR(18) PRIMARY KEY,
    description VARCHAR(40),
    cost DECIMAL(10,2) NOT NULL CHECK (cost>=0),
    price DECIMAL(10,2) NOT NULL CHECK(price>=0)
);
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :  SHOW CREATE TABLE parts;<BR>";

$sql = 
"SHOW CREATE TABLE parts;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :  DESCRIBE parts;<BR>";

$sql = 
"DESCRIBE parts;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :  INSERT INTO parts(part_no , description , cost , price) VALUES ('A-001' , 'COOLER' , 0 , -100);;<BR>";

$sql = 
"INSERT INTO parts(part_no , description , cost , price)
VALUES ('A-001' , 'COOLER' , 0 , -100);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :  INSERT INTO parts(part_no , description , cost , price) VALUES ('A-001' , 'COOLER' , 0 , 100), ('A-002' , 'COMPUTER' , 1000 , 1600), ('A-003' , 'MOBILE' , 5000 , 2000);<BR>";

$sql = 
"INSERT INTO parts(part_no , description , cost , price)
VALUES ('A-001' , 'COOLER' , 0 , 100),
        ('A-002' , 'COMPUTER' , 1000 , 1600),
        ('A-003' , 'MOBILE' , 5000 , 2000);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :  output SELECT * FROM parts;<BR>";

$sql = 
"SELECT * FROM parts;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :   Creating CHECK constraints as a table constraints<BR>";

$sql = 
"CREATE TABLE parts2(
    part_no VARCHAR(18) PRIMARY KEY,
    description VARCHAR(40) ,
    cost DECIMAL(10,2) NOT NULL CHECK (cost>=0),
    price DECIMAL(10,2) NOT NULL CHECK(price>=0),
    CONSTRAINT parts_chk_price_gt_cost
        CHECK(price >= cost)  -- table check;
);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :ERROR :   INSERT INTO parts2(part_no , description , cost , price) VALUES ('A-001' , 'COOLER' , 0 , 100), ('A-002' , 'COMPUTER' , 1000 , 1600), ('A-003' , 'MOBILE' , 5000 , 2000); <BR>";

$sql = 
"INSERT INTO parts2(part_no , description , cost , price)
VALUES ('A-001' , 'COOLER' , 0 , 100),
        ('A-002' , 'COMPUTER' , 1000 , 1600),
        ('A-003' , 'MOBILE' , 5000 , 2000); 
";

require('FILE/printdata.php');



ECHO "<HR>EXAMPLE : INSERT INTO parts2(part_no , description , cost , price) VALUES ('A-001' , 'COOLER' , 0 , 100), ('A-002' , 'COMPUTER' , 1000 , 1600), ('A-003' , 'MOBILE' , 2000 , 5000); <BR>";

$sql = 
"INSERT INTO parts2(part_no , description , cost , price)
VALUES ('A-001' , 'COOLER' , 0 , 100),
        ('A-002' , 'COMPUTER' , 1000 , 1600),
        ('A-003' , 'MOBILE' , 2000 , 5000); 
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :SELECT * FROM parts2; <BR>";

$sql = 
"SELECT * FROM parts2;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : ALTER TABLE parts2  ADD CONSTRAINT parts2_chk_part_no_notequalto_description CHECK(part_no != description); <BR>";

$sql = 
"ALTER TABLE parts2 
ADD CONSTRAINT parts2_chk_part_no_notequalto_description
CHECK(part_no != description);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : ALTER TABLE parts2  ADD CONSTRAINT parts2_chk_part_no_notequalto_description CHECK(part_no != description); <BR>";

$sql = 
"ALTER TABLE parts2 
ADD CONSTRAINT parts2_chk_part_no_notequalto_description
CHECK(part_no != description);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :  INSERT INTO parts2(part_no , description , cost , price) VALUES ('A-004' , 'A-004' , 3900 , 6900);<BR>";

$sql = 
"INSERT INTO parts2(part_no , description , cost , price)
VALUES ('A-004' , 'A-004' , 3900 , 6900);
";

require('FILE/printdata.php');



ECHO "<HR>EXAMPLE : SHOW CREATE TABLE parts2;";

$sql = 
"SHOW CREATE TABLE parts2;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE : ALTER TABLE parts2 DROP CHECK parts2_chk_part_no_notequalto_description;;";

$sql = 
"ALTER TABLE parts2
DROP CHECK parts2_chk_part_no_notequalto_description;
";

require('FILE/printdata.php');


$conn->close();
?>