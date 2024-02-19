<?php 
//Using ORDER BY clause sort the result set by multiple columns example
try{

    $conn = new PDO("mysql:host=localhost;dbname=classicmodels" , 'root' , '');
    $query = "SELECT 
                contactLastname,
                contactFirstname
             FROM
                customers
             ORDER BY 
                contactLastname DESC,
                contactFirstname ASC";

    $preparedStatement = $conn->prepare($query);

    $preparedStatement->execute();

    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    foreach($result as $values){
        foreach($values as $key=>$value){
            echo "$key  : $value || ";
        }
        echo "<BR>";
    }
    echo "</pre>";
}
catch(PDOException $e){
    echo "ERROR : " . $e->getMessage();
}
?>
<!-- 
    In this example, the ORDER BY  clause sorts the result set by the last name in descending order first and then sorts the sorted result set by the first name in ascending order to make the final result set.
 -->