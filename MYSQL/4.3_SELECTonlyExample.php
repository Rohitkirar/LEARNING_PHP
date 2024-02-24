<?php 
//SELECT can we use without FROM clause;
//Example to perform simple calculations
try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels", 'root' , '');
    
    $query = "SELECT 1 + 1";
    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC) ;

    echo "<pre>";
    print_r($result);
    echo "</pre>";
    $conn = null;
}
catch(PDOException $e){
    echo "ERROR : " .$e->getMessage();
}

//SELECT NOW() return date time ;

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels", 'root' , '');
    
    $query = "SELECT NOW() AS datatime";
    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC) ;

    echo "<pre>";
    print_r($result);
    echo "</pre>";
    $conn = null;
}
catch(PDOException $e){
    echo "ERROR : " .$e->getMessage();
}

//SELECT CONCAT('john' , ' ' , 'Doe') ;

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels", 'root' , '');
    
    $query = "SELECT CONCAT('JOHN' , ' ' , 'DOE') FullName" ;
    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC) ;

    echo "<pre>";
    print_r($result);
    echo "</pre>";
    $conn = null;
}
catch(PDOException $e){
    echo "ERROR : " .$e->getMessage();
}
?>
<!--
    * The SELECT statement doesn't require the FROM clause. It means that you can have a SELECT statement without the FROM clause like this:
    -> SELECT select_list;
    or
    -> SELECT 1+1 ; to perform simple calculation

    * MySQL has many built-in functions like string functions, date functions, and math functions.
    * You can use the SELECT statement to execute one of these functions.

    -> SELECT NOW(); return the current date and time of the server;

    * other example 

    -> SELECT CONCAT('john' , ' ' , 'Doe');
    
    Summary 
    * MySQL SELECT statement doesn’t require the FROM clause.
    * Assign an alias to a column to make it more readable. 
-->