<?php 
ECHO "EXAMPLE 1 : <BR>";
try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels;" , "root" , "");
    $query = "SELECT
                orderNumber,
                orderlinenumber,
                quantityOrdered * priceEach
              FROM orderdetails
              WHERE quantityOrdered * priceEach > 10000
              ORDER BY 
                quantityOrdered * priceEach DESC;";
    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchALL(PDO::FETCH_ASSOC);
    
    echo "<pre>";
    print_r($result);
    echo "</pre>";

    $conn = null;
}
catch(PDOException $e){
    echo "Error : ".$e->getMessage();
}

echo "<BR>";

ECHO "EXAMPLE 2 : <BR>";

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels;" , "root" , "");
    $query = "SELECT
                orderNumber,
                orderlinenumber,
                quantityOrdered * priceEach AS subtotal
              FROM orderdetails
              WHERE quantityOrdered * priceEach > 10000
              ORDER BY 
                subtotal DESC;";
    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchALL(PDO::FETCH_ASSOC);
    
    echo "<pre>";
    print_r($result);
    echo "</pre>";
}
catch(PDOException $e){
    echo "Error : ".$e->getMessage();
}
?>