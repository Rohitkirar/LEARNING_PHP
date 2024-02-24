<?php 

    $host = 'localhost';
    $username = 'root' ;
    $password  = '' ; 
    $dbname = 'classicmodels';

    $conn = mysqli_connect($host , $username , $password , $dbname);

    if(mysqli_connect_error()){
        echo "ERROR " . mysqli_connect_error() ; 
    }
    else{
        echo "connection successfull <BR>";
    }

?>