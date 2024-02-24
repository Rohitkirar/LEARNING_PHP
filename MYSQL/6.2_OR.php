<?php 
/**
 * OR operator in where clause Example solved
 * Summary
 * The OR operator combines two Boolean expressions and returns true when either expression is true. Otherwise, it returns false.
 * MySQL evaluates the OR operator after the AND operator if an expression contains both AND and OR operators.
 * Use parentheses to change the order of evaluation.
 */
Echo "ExAMple 1 : <BR>";
try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels" , "root",  "");
    $query = "SELECT 
                lastname,
                firstname,
                jobtitle,
                officeCode
              FROM 
                employees
              WHERE
                jobtitle = 'Sales Rep' 
                OR
                officeCode = 1";

    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    $conn = null;
}
catch(PDOException $e){
    echo "ERROR : " . $e->getMessage();
}

ECHO "<hr>sExAMPLE 2 : <BR> ";
{
  $conn = new mysqli("localhost" , "root" , "" , "classicmodels");
  $sql = "SELECT 
            customername,
            country
          FROM
            customers
          WHERE 
            country = 'USA' 
          OR
            country = 'France'
            ;";
  $queryResult = $conn->query($sql);
  $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
  echo "<pre>" ; print_r($resultArray); echo "</pre>";
}

Echo "<HR>EXAMPLE 3 : <BR>";
{
  $sql = "SELECT
              customername,
              country,
              creditLimit
          FROM
              customers
          WHERE
            (country = 'USA' OR country = 'France')
          AND
            creditLimit>100000;";
  $queryResult = $conn->query($sql);
  $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
  echo "<pre>" ; print_r($resultArray) ; echo "</pre>";
}

Echo "<HR>EXAMPLE 4 : <BR>";
{
  $sql = "SELECT
              customername,
              country,
              creditLimit
          FROM
              customers
          WHERE
            country = 'USA' 
          OR 
            country = 'France'
          AND
            creditLimit>100000;";
  $queryResult = $conn->query($sql);
  $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
  echo "<pre>" ; print_r($resultArray) ; echo "</pre>";
}

?>