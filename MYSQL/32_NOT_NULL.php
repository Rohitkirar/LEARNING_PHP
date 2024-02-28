<?php 
echo "<PRE>";
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE : 1 adding NOT NULL Constraint <BR>";

$sql = 
"CREATE TABLE tasks2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE
);
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :2 adding data<BR>";

$sql = 
"INSERT INTO tasks2(title , start_date , end_date)
VALUES ('Learn MySQL NOT NULL constraint' , '2017-02-01' , '2017-02-02'),
        ('check and update Not null constraint' , '2017-02-10', NULL );
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :3 adding data<BR>";

$sql = 
"INSERT INTO tasks2(title)
VALUES('checking' );
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :4 PRINTING DATA OF TABLE tasks2<BR>";

$sql = 
"SELECT * FROM tasks2;
";

require('FILE/printdata.php');

// -- -- Adding a NOT NULL constraint to an existing column

// -- First, check the current values of the column if there are any NULL values.
// -- Second, update the NULL to non-NULL.
// -- Third, modify the column with a NOT NULL constraint.


ECHO "<HR>EXAMPLE :5 -- disable sql safe update<BR>";

$sql = 
"SET sql_safe_updates = 0;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :-- show table constraint<BR>";

$sql = 
"SHOW CREATE TABLE tasks2;
";


require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :6 updating the null values present in table<BR>";

$sql = 
"UPDATE tasks2 
SET end_date = start_date + 7
WHERE end_date IS NULL;
";

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :7 -- adding a NOT NULL constraint<BR>";

$sql = 
"ALTER TABLE tasks2
MODIFY end_date DATE NOT NULL;
";

// 2 second way

// ALTER TABLE tasks2
// CHANGE end_date 
//         end_date DATE NOT NULL	;

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :-- show table constraint<BR>";

$sql = 
"SHOW CREATE TABLE tasks2;
";


require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :8 --REMOVING a NOT NULL constraint<BR>";

$sql = 
"ALTER TABLE tasks2
MODIFY end_date DATE;
";

// -- 2nd second

// ALTER TABLE tasks2
// CHANGE end_date 
//         end_date DATE	;

require('FILE/printdata.php');


ECHO "<HR>EXAMPLE :-- show table constraint<BR>";

$sql = 
"SHOW CREATE TABLE tasks2;
";


require('FILE/printdata.php');

echo "</pre>" ;
$conn->close();
?>