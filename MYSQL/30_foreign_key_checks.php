<?php 
require_once('FILE/connection.php');

// The line foreign_key_checks = 0 is typically used in MySQL to disable foreign key constraint checks temporarily. When set to 0, it allows you to perform operations (such as inserts, updates, or deletes) without enforcing foreign key constraints. However, it’s essential to be cautious when using this setting, as it can lead to data integrity issues if not handled properly.


ECHO "<HR>EXAMPLE :To disable foreign key checks, you set the foreign_key_checks variable to zero as follows:<BR>";

$sql = 
"SET foreign_key_checks = 0;";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE :To enable the foreign key constraint check, you set the value of the foreign_key_checks to 1:<BR>";

$sql = 
"SET foreign_key_checks = 1;";

require('FILE/printdata.php');
?>