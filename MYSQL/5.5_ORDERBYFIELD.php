<?php 
/*
The FIELD() function returns the position of the value in the list of values value1, value2, and so on.
SELECT FIELD('A', 'A', 'B','C'); //return 1
SELECT FIELD('B', 'A','B','C');  //return 2
*/

$conn = new PDO("mysql:host=localhost;dbname=classicmodels;" ,'root' , '');
$query = "SELECT 
                orderNumber,
                status
            FROM 
                orders
            ORDER BY 
            FIELD(
                status,
                'In Process',
                'On Hold',
                'Cancelled',
                'Resolved',
                'Disputed',
                'Shipped'
            )
            ";

$preparedStatement = $conn->prepare($query);
$preparedStatement->execute();

$result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($result);
echo "</pre>";
?>