<?php 
Echo "EXAMPLE 3 : Sort the result by ASC <BR>" ;

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels" , 'root' , '') ;

    $query = "SELECT
              contactFirstname
              FROM
              customers
              ORDER BY
              contactFirstName ASC;";

    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
   
    foreach ($result as $values){
        foreach($values as $key=>$value){
            echo "$key : $value";
        }
        echo "<BR>";
    }

    echo "</pre>";
}
catch(PDOException $e){
    echo "ERROR : " . $e->getMessage();
}
?>