<?php 
require_once('FILE/connection.php');

ECHO '<HR>EXAMPLE <BR>';

$sql = 
"CREATE TABLE projects(
    project_id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    start_date DATE,
    end_date DATE,
    PRIMARY KEY(project_id)
);
";

require('FILE/printdata.php');

ECHO '<HR>EXAMPLE <BR>';

$sql = 
"INSERT INTO projects
(name , start_date , end_date)
VALUES 
('AI FOR marketing' , '2019-08-01' , '2019-12-31'),
('ML FOR Sales' , '2019-05-15' , '2019-11-20');
";

require('FILE/printdata.php');

ECHO '<HR>EXAMPLE <BR>';

$sql = 
"INSERT INTO projects
(name , start_date , end_date)
VALUES 
('marketing site' , '2009-01-01' , '2019-12-31'),
('Sales site' , '2003-07-10' , '2014-11-01');
";

require('FILE/printdata.php');

ECHO '<HR>EXAMPLE <BR>';

$sql = 
"INSERT INTO projects
(name , start_date , end_date)
VALUES
('NeuroSynthIQ' , '2023-12-01' , '2024-12-31'),
('QuantumMind Explorer' , '2023-05-15' , '2024-12-20' ),
('SentientBot Assistant' , '2023-05-15' , '2024-10-20');
";

require('FILE/printdata.php');

ECHO '<HR>EXAMPLE <BR>';

$sql = 
"INSERT INTO projects
(name , start_date , end_date)
VALUES
('NeuroSynthIQ' , '2023-12-01' , '2024-12-31'),
('ZuantumMind oxplorer' , '2023-05-15' , '2024-12-20' ),
('PeuroSynthIQ' , CURRENT_DATE , null),
('UantumMind Ispxplorer' , '2023-05-15' , '2024-12-20' ),
('EuroSynthIQ' , '2023-12-01' , '2024-12-31'),
('QuantumMind Explorer' , '2023-12-15' , '2024-12-40' ),
('SentientBot Assistant' , '2023-15-15' , '2024-10-20');
";

require('FILE/printdata.php');

ECHO '<HR>EXAMPLE <BR>';

$sql = 
"SELECT * FROM projects;
";

require('FILE/printdata.php');

ECHO '<HR>EXAMPLE <BR>';

$sql = 
"INSERT INTO projects
(name , start_date , end_date)
VALUES
('NeuroSynthIQ' , '2023-12-01' , '2024-12-31'),
('ZuantumMind oxplorer' , '2023-05-15' , '2024-12-20' ),
('PeuroSynthIQ' , CURRENT_DATE , null),
('UantumMind Ispxplorer' , '2023-05-15' , '2024-12-20' ),
('EuroSynthIQ' , '2023-12-01' , '2024-12-31'),
('QuantumMind Explorer' , '2023-12-15' , '2024-12-40' ),
('SentientBot Assistant' , '2023-15-15' , '2024-10-20');
";

require('FILE/printdata.php');
?>