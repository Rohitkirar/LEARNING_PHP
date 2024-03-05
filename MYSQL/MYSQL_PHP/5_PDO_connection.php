<?php 

// PDO CONNECTION
$server = 'localhost' ;
$user = 'root' ;
$password = '' ;
$dbname = 'classicmodels';

try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname;" , $user , $password);
    echo "CONNECTION SUCCESSFULL<BR>";
    $conn = null;
}
catch(PDOException $e){
    echo 'ERROR '. $e->getMessage(); 
}

// 2nd way : 

try{
    $conn = new PDO('mysql:host=localhost;dbname=classicmodels;' , 'root' , '');
    echo "connection successfull<BR>";
    $conn = null;
}
catch(PDOException $e){
    echo "ERROR " . $e->getMessage();
}

// Note: In the PDO example above we have also specified a database (myDB). 
// PDO require a valid database to connect to. If no database is specified, 
// an exception is thrown.

?>