<?php 
//In mysql , null comes befor the nonnull values  
//therefore when you use ORDER BY clause with the ASC option , NULL appear first in the result set.

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels;" , 'root' , '');
    $query = "SELECT 
                firstName,
                lastName,
                reportsTo
              From
                employees
              ORDER BY 
                reportsTo" ;

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
<!-- 
    Summary
    -> Use the ORDER BY clause to sort the result set by one or more columns.
    -> Use the ASC option to sort the result set in ascending order and the DESC option to sort the result set in descending order.
    -> The ORDER BY clause is evaluated after the FROM and SELECT clauses.
    -> In MySQL, NULL is lower than non-NULL values
 -->