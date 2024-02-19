<?php 
//OR operator in where clause Example solved
try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels" , "root",  "");
    $query = "SELECT 
                lastname,
                firstname,
                jobtitle,
                officeCode
              FROM 
                employees
              WHERE
                jobtitle = 'Sales Rep' 
                OR
                officeCode = 1";

    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
}
catch(PDOException $e){
    echo "ERROR : " . $e->getMessage();
}
?>