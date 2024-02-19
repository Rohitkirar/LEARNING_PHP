<?php 
//using * we can all column value in our result set
//Example 5 to select all columns of table 
Echo "Example 5 :<BR>" ;
try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels;" , 'root' , '');
    $query = "SELECT * FROM employees";
    $preparedStatement = $conn->prepare($query);

    $preparedStatement->execute();

    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $values){
        
        foreach($values as $key=>$value)
            echo "<pre>$key : $value </pre>";
        echo "<BR>";
    }
}
catch(PDOException $e){
    Echo "ERROR : ".$e->getMessage();
}
?>