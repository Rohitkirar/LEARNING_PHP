<?php

//MySQLi object oriented

$server = 'localhost';
$user = 'root';
$password = '';
$dbName = 'classicmodels';

$conn = new mysqli($server , $user , $password , $dbName);

if($conn->connect_error){
    echo "ERROR : ". $conn->connect_error;
}
else{
    echo "connection successfull <BR>";
}

$conn->close();

// 2nd 

$conn = new mysqli($server , $user , $password );

if(mysqli_connect_error()){
    echo "ERROR : ". mysqli_connect_error();
}
else{
    echo "connection successfull <BR>";
}

$conn->close();

/*
$connect_error was broken until PHP 5.2.9 and 5.3.0. If you need to ensure compatibility with PHP versions prior to 5.2.9 and 5.3.0, use the following code instead:

// Check connection
if (mysqli_connect_error()) {
  die("Database connection failed: " . mysqli_connect_error());
}
*/
?>