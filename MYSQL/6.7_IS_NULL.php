<?php 

/**
 * IS NULL : Use the IS NULL operator to test if a value is NULL or not. 
 * IS NOT NULL : The IS NOT NULL operator negates the result of the IS NULL operator.
 * The value IS NULL returns true if the value is NULL or false if the value is not NULL.
 * The value IS NOT NULL returns true if the value is not NULL or false if the value is NULL.
 * SUMMARY : 
 * Use the IS NULL operator to test if a value is NULL or not. The IS NOT NULL operator negates the result of the IS NULL operator.
 * The value IS NULL returns true if the value is NULL or false if the value is not NULL.
 * The value IS NOT NULL returns true if the value is not NULL or false if the value is NULL.
 */

$conn = new mysqli("localhost" , "root" , "" , "classicmodels");
ECHO "EXAMPLE 1 : <BR>"; //IS NULL
{
    $sql = "SELECT 
                customerName,
                country,
                salesrepemployeenumber
            From
                customers
            WHERE
                salesrepemployeenumber IS NULL ; ";
    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);


    echo "<TABLE>";
    if(count($resultArray)){
    echo "<tr><th>Name</th><th>country</th><th>salesRepemployeenumber</th></tr>" ;
    }
    foreach($resultArray as $values){
        echo "<tr>";
        foreach($values as $key => $value)
            echo "<td>$value</td>" ;
        echo "</tr>";
    }
    echo "</table>";
}

ECHO "<HR>EXAMPLE 2 : <BR>"; //IS NOT NULL
{
    $sql = "SELECT 
                customerName,
                country,
                salesrepemployeenumber
            From
                customers
            WHERE
                salesrepemployeenumber IS NOT NULL ; ";
    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);


    echo "<TABLE>";
    if(count($resultArray)){
    echo "<tr><th>Name</th><th>country</th><th>salesRepemployeenumber</th></tr>" ;
    }
    foreach($resultArray as $values){
        echo "<tr>";
        foreach($values as $key => $value)
            echo "<td>$value</td>" ;
        echo "</tr>";
    }
    echo "</table>";
}
?>