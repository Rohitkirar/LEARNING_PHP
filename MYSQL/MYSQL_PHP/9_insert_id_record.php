<?php 
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'TestingPHP';

$sql = 
'INSERT INTO customers 
    (firstName , lastName , email , mobile)
VALUES
    ("JOHN" , "CENA" , "johncena123@gmail.com" , "1122334455"),
    ("BROCK" , "Lesnar" , "brocklesnar123@gmail.com" , "6677889900");
'; 


ECHO "MySQLi PROCEDURAL<BR>";

$conn = mysqli_connect($server , $user , $password , $dbname);

if(!$conn){
    echo "ERROR : " . mysqli_connect_error($conn) ;
}
$result = mysqli_query($conn , $sql);

if($result === true){
    echo 'data inserted successfully<BR>';
    $last_id = mysqli_insert_id($conn);
    ECHO "last inserted id is : $last_id<BR>";
}
else
    echo 'error in inserting into table' . mysqli_error($conn);

mysqli_close($conn);



ECHO "MYSQLi object ORIENTED <BR>";

$conn = new mysqli($server , $user , $password , $dbname);

if($conn->connect_error){
    echo "error : " . $conn->connect_error ;
}

$result = $conn->query($sql);

if($result === true){
    echo 'data inserted successfully <BR>';
    $last_id = $conn->insert_id;
    ECHO "last inserted id is : $last_id<BR>";
}
else{
    echo "error inserting data " . $conn->error;
}

$conn->close();


ECHO "PDO <BR>";

try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname;"  , $user  , $password);

    $conn->exec($sql);

    echo "data inserted successfully<BR>";
    $last_id = $conn->lastInsertId();
    ECHO "last inserted id is : $last_id<BR>";

    $conn = null;
}
catch(PDOException $e){
    echo "error : " . $e->getMessage();
}


?>