<?php 
$server = 'localhost';
$user = 'root';
$password = '';

$sql = 'CREATE DATABASE IF NOT EXISTS TestingPHP';


//mysqli procedural
ECHO "MYSQLI PROCEDURAL <BR>";

$conn = mysqli_connect($server , $user , $password);

if(!$conn){
    die('connection failed: ' . mysqli_connect_error());
}

$result = mysqli_query($conn ,$sql);

if($result === true)
    echo "database successfully created <BR>";
else{
    echo "error in creating database<BR>". mysqli_error($conn);
}

mysqli_close($conn);

//mysqli object oriented
ECHO "MYSQLI OBJECT ORIENTED <BR>";

$conn = new mysqli($server , $user , $password);

if($conn->connect_error){
    die('connection failed' . $conn->connect_error);
}

$result = $conn->query($sql);
if($result === true){
    echo 'Database created successfully<br>';
}
else{
    echo "ERROR in creating databse " . $conn->error;
}

$conn->close();

// PDO 
ECHO "PDO <BR>";
try{
    $conn = new PDO("mysql:host=$server;" , $user , $password);

    $result = $conn->exec($sql);

    ECHO "successfully created database<BR>";

}
catch(PDOException $e){
    echo "ERROR " . $e->getMessage();
}

// Tip: A great benefit of PDO is that it has exception class to handle any problems that may occur in our database queries. If an exception is thrown within the try{ } block, the script stops executing and flows directly to the first catch(){ } block. In the catch block above we echo the SQL statement and the generated error message.

?>