<?php 

$server = "localhost";
$username = "root";
$password = "" ;
$database = "classicmodels";

$conn = new mysqli($server ,$username , "" ,$database);

if($conn->connect_error){
   echo "ERROR " . $conn->connect_error;
}
else{
    echo "Database Successfully Connected!" ;
}
?>