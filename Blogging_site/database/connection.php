<?php 
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'blogging_site';

$conn = mysqli_connect($server , $user , $password , $dbname);

if(!$conn){
    echo "ERROR " . mysqli_connect_error($conn);
}

?>