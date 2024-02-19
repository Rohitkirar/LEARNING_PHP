<?php 
//IN operator returns true if a value matches any value in a list;
//value IN (value1, value2,...)
try{
$conn = new PDO("mysql:host=localhost;dbname=classicmodels;" ,"root" , "");
$query = "SELECT 
            firstName,
            lastName,
            officeCode
        FROM 
            employees
          WHERE 
            officeCode IN (1,2,3)";
$preparedStatement = $conn->prepare($query);
$preparedStatement->execute();
$result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($result);
echo "</pre>";
}
catch(PDOException $e){
    echo "ERROR : ". $e->getMessage();
}

// Example 2 
try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels;" , "root" , "");
    $query = "SELECT 
                customername,
                contactlastname,
                country
              FROM 
                customers
              WHERE
                country IN ('USA' , 'Spain' , 'France')
              ORDER BY 
                country ; ";
    
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