<?php 
//The search_condition is a combination of one or more expressions using the logical operator AND, OR and NOT.
// AND return only result that satisfy both the conditions
try{
$conn = new PDO("mysql:host=localhost;dbname=classicmodels;" ,  "root" , "");
$query = "SELECT
            lastname,
            firstname,
            jobtitle,
            officeCode
        From
            employees
        WHERE 
            jobtitle = 'Sales Rep' 
            AND
            officeCode = 1";
    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($result);
    echo "</prev>";
}
catch(PDOException $e){
    echo "ERROR : ".$e->getMessage();
}
?>