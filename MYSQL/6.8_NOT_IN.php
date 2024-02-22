<?php 
/**
 * The NOT IN operator returns one if the value doesn’t equal any value in the list. 
 * Otherwise, it returns 0.
 * Use the MySQL NOT IN to check if a value doesn’t match any value in a list.
*/

$conn = new mysqli("localhost" , "root" , "" , "classicmodels");

Echo "EXAMPLE 1 : NOT IN EXAMPLE<BR>";

$sql = "SELECT 
        officeCode,
        city,
        phone,
        country
    From 
        offices
    WHERE 
        country NOT IN ('USA' , 'FRANCE') 

    ORDER BY
        city ; ";
    
$queryResult = $conn->query($sql);
$resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
echo "<Pre>" ; print_r($resultArray); echo "</PRE>" ;
?>