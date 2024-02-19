<?php
/*
The LIKE operator evaluates to TRUE if a value matches a specified pattern
To form a pattern, we use "%" and "_"

-> % : matches a string of zero or more characters 
-> _ : matches any single character only
*/
$conn = new PDO("mysql:host=localhost;dbname=classicmodels" , "root" , "");
$query = "SELECT firstName,
                lastName
            FROM 
                employees
            WHERE
                lastName LIKE '%son'
            ORDER BY
                firstName;";
    
$preparedStatement = $conn->prepare($query);

$preparedStatement->execute();
$result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($result);
echo "</pre>";

?>