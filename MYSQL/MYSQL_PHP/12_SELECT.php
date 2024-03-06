<?php 
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'testingPHP';

    $conn = new mysqli($server , $user , $password , $dbname);

    ECHO "<BR>EXAMPLE 1 : <BR>";

    $sql = 'SELECT * FROM customers';

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        foreach($resultArray as $values){
            foreach($values as $key => $value){
                echo "$key : $value || ";
            }
            echo "<BR>";
        }
    }
    
    ECHO "<BR> EXAMPLE 2 : <BR>";

    $result = $conn->query('SELECT * FROM customers;');
    
    if($result->num_rows > 0){
        while($resultArray = $result->fetch_assoc()){
            echo $resultArray['fullName'] . " " . $resultArray['email'] . " ". $resultArray['mobile'] . " "."<BR>" ;
        }
    }

    $conn->close();
    
    ECHO "<BR> EXAMPLE 3 : Procedural MySQLi fetching data using select <BR>";

    $conn = mysqli_connect($server , $user , $password , $dbname);

    if(!$conn){
        echo "ERROR : " . mysqli_connect_error($conn);
    }
    $result = mysqli_query($conn , 'SELECT * FROM customers where firstName LIKE "R%";');

    if(mysqli_num_rows($result) > 0){
        while($resultArray = mysqli_fetch_assoc($result)){
            echo $resultArray['id']." | ".$resultArray['fullName'].' | '.$resultArray['email'].' | '.$resultArray['mobile']."<br>";
        }
    }
    


//  the function num_rows() checks if there are more than zero rows returned.
// function fetch_assoc() puts all the results into an associative array 
// If we use inside in while this function fetch_assoc() then it print row data one by one all data



?>