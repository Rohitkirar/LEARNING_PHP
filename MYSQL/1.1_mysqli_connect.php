<?php 

// MYSQLI procedural connection to db

    $conn = mysqli_connect('localhost' , 'root' , '' , 'classicmodels');
    if(mysqli_connect_error()){
        echo "ERROR : ". mysqli_connect_error();
    }
    else {
        echo "CONNECTION SUCcESSFULL <BR>";
        $sql = "SELECT * FROM employees";
        $result  = $conn->query($sql);
        echo"<PRE>"; print_r($result->fetch_all(MYSQLI_ASSOC)); echo "</pre>";
    }

?>