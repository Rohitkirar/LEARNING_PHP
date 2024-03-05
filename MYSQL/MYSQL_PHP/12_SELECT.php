<?php 

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'testingPHP';

    $conn = new mysqli($server , $user , $password , $dbname);

    $sql = 'SELECT * FROM customers';

    $result = $conn->query($sql);

    ECHO "<BR>EXAMPLE 1 : <BR>";

    if($result->num_rows > 0){
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        foreach($resultArray as $values){
            foreach($values as $key => $value){
                echo "$key : $value || ";
            }
            echo "<BR>";
        }
    }
    

    $result = $conn->query('SELECT * FROM customers WHERE firstName LIKE "R%";');
    
    ECHO "<BR> EXAMPLE 2 : <BR>";

    if($result->num_rows > 0){
        $resultArray = $result->fetch_assoc();
        print_r($resultArray);
        while($resultArray){
    
        }
    }

//  the function num_rows() checks if there are more than zero rows returned.
// function fetch_assoc() puts all the results into an associative array 
?>