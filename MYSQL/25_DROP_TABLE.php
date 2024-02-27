<?php 
require_once('FILE/connection.php');
$conn = mysqli_connect('local' ,'root' , '' , 'hr');

ECHO "<HR>EXAMPLE 1 : droping a single table <BR>";

$sql = 
"DROP TABLE IF EXISTS insurances;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 2 : droping multiple table <BR>";

$sql = 
"DROP TABLE IF EXISTS CarAccessories , CarGadgets;
";

require('FILE/printdata.php');

ECHO "<HR>EXAMPLE 3 : ERROR : doesn't exist <BR>";

$sql = 
"DROP TABLE carAccessories; 
";

require('FILE/printdata.php');
?>