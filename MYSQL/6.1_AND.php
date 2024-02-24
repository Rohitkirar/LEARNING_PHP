<?php 
//The search_condition is a combination of one or more expressions using the logical operator AND, OR and NOT.
// AND return only result that satisfy both the conditions
echo "ExAMplE 1 : <BR>" ;
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
    $conn = null;
}
catch(PDOException $e){
    echo "ERROR : ".$e->getMessage();
}

ECHO "<HR>EXAMPLE 2 : <BR>";
$conn = new mysqli("localhost" , 'root' , '' , "classicmodels");
{
    $sql = "SELECT 
                customername,
                country,
                state
            FROM
                customers
            WHERE 
                country = 'USA' 
                AND
                state = 'CA'" ;
    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
    
    echo "<pre>" ; print_r($resultArray); echo "</pre>";
}

ECHO "<HR>EXAMPLE 3 : <BR>";
{
    $sql = "SELECT 
                customername,
                country , 
                state, 
                creditlimit
            FROM
                customers
            WHERE
                country = 'USA' AND
                state = 'CA' AND 
                creditlimit > 100000";
    
    $queryResult = $conn->query($sql);
    $resultArray  = $queryResult->fetch_all(MYSQLI_ASSOC);
    echo "<pre>" ; print_r($resultArray); echo "</pre>";
}
?>