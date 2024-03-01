<?php 
require_once('FILE/connection.php');

echo "<HR>EXAMPLE inserting data in contacts table<BR>";

$sql = 
"INSERT INTO contacts (first_name, last_name, email)
VALUES
    ('John', 'Doe', 'john.doe@email.com'),
    ('Jane', 'Smith', 'jane.smith@email.com'),
    ('Alice', 'Doe', 'alice.doe@email.com'),
    ('Bob', 'Johnson', 'bob.johnson@email.com'),
    ('Eva', 'Doe', 'eva.doe@email.com'),
    ('Michael', 'Smith', 'michael.smith@email.com'),
    ('Sophia', 'Johnson', 'sophia.johnson@email.com'),
    ('Matthew', 'Doe', 'matthew.doe@email.com'),
    ('Olivia', 'Smith', 'olivia.smith@email.com'),
    ('Daniel', 'Johnson', 'daniel.johnson@email.com'),
    ('Emma', 'Doe', 'emma.doe@email.com'),
    ('William', 'Smith', 'william.smith@email.com'),
    ('Ava', 'Johnson', 'ava.johnson@email.com'),
    ('Liam', 'Doe', 'liam.doe@email.com'),
    ('Mia', 'Smith', 'mia.smith@email.com'),
    ('James', 'Johnson', 'james.johnson@email.com'),
    ('Grace', 'Doe', 'grace.doe@email.com'),
    ('Benjamin', 'Smith', 'benjamin.smith@email.com'),
    ('Chloe', 'Johnson', 'chloe.johnson@email.com'),
    ('Logan', 'Doe', 'logan.doe@email.com');
";

require('FILE/printdata.php');


ECHO "<HR>QUERY output data from contacts<BR>";

$sql = 
"SELECT * FROM contacts;
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 2 : delete the row of id = 35<BR>";

$sql = 
"DELETE FROM contacts
WHERE id = 35;
";

require('FILE/printdata.php');


ECHO "<HR>QUERY output data from contacts<BR>";

$sql = 
"SELECT * FROM contacts;
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 3 : delete the row of latname = 'smith'<BR>";

$sql = 
"DELETE FROM contacts
WHERE last_name = 'Smith';
";

require('FILE/printdata.php');

ECHO "<HR>QUERY output data from contacts<BR>";

$sql = 
"SELECT * FROM contacts;
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 4 : delete the row using limit and order by clause<BR>";

$sql = 
"DELETE FROM contacts 
ORDER BY first_name
LIMIT 5;
";

require('FILE/printdata.php');

ECHO "<HR>QUERY output data from contacts<BR>";

$sql = 
"SELECT * FROM contacts;
";

require('FILE/printdata.php');

ECHO "<HR>QUERY 5 : delete all the row<BR>";

$sql = 
"DELETE FROM contacts;
";

require('FILE/printdata.php');


ECHO "<HR>QUERY output data from contacts<BR>";

$sql = 
"SELECT * FROM contacts;
";

require('FILE/printdata.php');

// use TRUNCATE TABLE instead of this to delete all rows data from table;

/*
    Summary
    Use the DELETE statement to delete one or more rows from a table.
    Use the DELETE statement without a WHERE clause to delete all rows from a table.
    Use the DELETE statement with a LIMIT clause to delete several rows from a table.
*/
?>