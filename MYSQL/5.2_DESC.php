<?php 
Echo "EXAMPLE 4 : Sort the result by DESC <BR>" ;

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels" , 'root' , '') ;

    $query = "SELECT
              contactFirstname
              FROM
              customers
              ORDER BY
              contactFirstName DESC;";

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