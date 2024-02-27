<?php 
require_once('FILE/connection.php');

ECHO "<HR>EXAMPLE  1 : drop column caption  <BR>";

$sql = 
"ALTER TABLE posts 
DROP COLUMN caption;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 2 : drop multiple columns  <BR>";

$sql = 
"ALTER TABLE posts
DROP COLUMN created_at,
DROP COLUMN updated_at;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 3 : we also drop primary key column <BR>";

$sql = 
"ALTER TABLE posts
DROP COLUMN id;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 4 : WE cannot delete foreign key col. TO do so first remove foreign key constriant<BR>";

$sql = 
"ALTER TABLE posts
DROP category_id;  
";

require('FILE/printdata.php');

$conn->close();
?>