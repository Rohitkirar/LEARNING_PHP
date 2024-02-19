<?php 
//The BETWEEN operator returns TRUE if a value is in a range of values;
// expression BETWEEN low AND high

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels;", "root" , "");
    $query = "SELECT 
                firstName,
                lastName,
                officeCode
              From 
                employees
              WHERE 
                officeCode BETWEEN 1 AND 3";

    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
}
catch(PDOException $e){
    echo "ERROR " . $e->getMessage();
}
?>