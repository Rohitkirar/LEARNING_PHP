<?php
$serverName = 'localhost' ;
$user = 'root' ;
$password = '' ;
$dbname = 'classicmodels';

// connection
$conn = mysqli_connect($serverName , $user , $password , $dbname);

// checking
if(!$conn){
    die('connection failed : ' . mysqli_connect_error());
}
else {
    echo 'Connected successfully<BR>';
}

mysqli_close($conn);

// 2nd way connection
$conn1 = mysqli_connect('localhost' ,'root' , '' );

//checking
if(mysqli_connect_error()){
    echo "ERROR : ". mysqli_connect_error();
}
else{
    echo "CONNECTION SUCCESSFULL FOR CONN2 <BR>";
}

mysqli_close($conn);
?>