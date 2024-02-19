<?php 

//mysqli object oriented (i : improved)
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

$conn->close();

echo "<HR>";
// //mysqli procedural
// $conn = new mysqli($server , "");

// if(!$conn){
//    die( "ERROR " . $conn->connect_error );
// }
// else{
//     echo "Database Successfully Connected!" ;
// }
?>