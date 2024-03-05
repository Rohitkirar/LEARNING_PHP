<?php 
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'TestingPHP';

$sql = 
'CREATE TABLE IF NOT EXISTS customers(
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    fullName VARCHAr(100) GENERATED ALWAYS AS (CONCAT(firstName, " " , lastName)),
    email VARCHAR(50)  NOT NULL UNIQUE,
    mobile VARCHAR(20) NOT NULL UNIQUE
);' ;


ECHO "MySQLi PROCEDURAL<BR>";

$conn = mysqli_connect($server , $user , $password , $dbname);

if(!$conn)
    echo "ERROR : " . mysqli_connect_error($conn) ;

$result = mysqli_query($conn , $sql);

if($result === true)
    echo 'table created successfully<BR>';
else
    echo 'error in creating table' . mysqli_error($conn);

mysqli_close($conn);



ECHO "MYSQLi object ORIENTED <BR>";

$conn = new mysqli($server , $user , $password , $dbname);

if($conn->connect_error){
    echo "error : " . $conn->connect_error ;
}

$result = $conn->query($sql);

if($result === true)
    echo 'table successfully created <BR>';
else{
    echo "error in table creating " . $conn->error;
}

$conn->close();


ECHO "PDO <BR>";

try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname;"  , $user  , $password);

    $conn->exec($sql);

    echo "table created successfully<BR>";

    $conn = null;
}
catch(PDOException $e){
    echo "error : " . $e->getMessage();
}


?>