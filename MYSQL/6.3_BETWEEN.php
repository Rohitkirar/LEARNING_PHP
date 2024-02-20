<?php 
{
  /* 
  The BETWEEN operator returns TRUE if a value is in a range of values;
  expression BETWEEN low AND high
  Summary
  Use the MySQL BETWEEN operator to test if a value falls within a range of values.
  */
}
ECHO "EXAMPLE 1 : <BR>";
{
  try{
      $conn = new PDO("mysql:host=localhost;dbname=classicmodels;", "root" , "");
      $query = "SELECT 
                  firstName,
                  lastName,
                  officeCode
                From 
                  employees
                WHERE 
                  officeCode BETWEEN 1 AND 3";

      $preparedStatement = $conn->prepare($query);
      $preparedStatement->execute();
      $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
      echo "<pre>";
      print_r($result);
      echo "</pre>";

      $conn = null;
  }
  catch(PDOException $e){
      echo "ERROR " . $e->getMessage();
  }
}

ECHO "<HR>EXAMPLE 2 : <BR>";
{
  $conn = new mysqli("localhost" , "root" , "" , "classicmodels");
  $sql = "SELECT 
              productCode,
              productName,
              buyPrice
          From
              products
              WHERE
              buyPrice BETWEEN 90 AND 100 ;";
  
  $queryResult = $conn->query($sql);
  $result = $queryResult->fetch_all(MYSQLI_ASSOC);

  echo "<pre>" ; print_r($result); echo "</pre>" ;
}

ECHO "<HR> EXAMPLE 3 : <BR>" ;
{
  $sql = "SELECT 
              productCode,
              productName,
              buyPrice
          FROM
              products
          WHERE
              buyPrice >= 80 AND buyPrice <= 90 
          ORDER BY 
              buyPrice DESC ; ";
  $queryResult = $conn->query($sql);
  $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);

  echo "<pre>" ; print_r($resultArray); echo "</pre>" ;
}

ECHO "<HR>EXAMPLE 4 : <BR>";
{
  $sql = "SELECT
              productCode,
              productName,
              buyPrice
          FROM
              products
          WHERE 
              buyPrice NOT BETWEEN 20 AND 100 
          ORDER BY 
              buyPRICE ; ";
  $queryResult = $conn->query($sql);
  $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
  echo "<pre>" ; print_r($resultArray) ; echo "</pre>" ;
}

ECHO "<HR>EXAMPLE 5 : <BR>" ;
{
  $sql = "SELECT
            productCode,
            productName,
            buyPrice
          FROM
            products
          WHERE
            buyPrice < 20 
            OR
            buyPrice > 100 ;";
  $queryResult = $conn->query($sql);
  $result = $queryResult->fetch_all(MYSQLI_ASSOC);
  echo "<pre>" ; print_r($result); echo "</pre>" ;

}

ECHO "<HR> EXAMPLE 6 : <BR> " ;
{
  $sql = "SELECT
            OrderNumber,
            requiredDate,
            status
          FROM
            orders
          WHERE
            requiredDate 
          BETWEEN 
            CAST('2003-01-01' AS DATE)
          AND
            CAST('2003-01-31' AS DATE)
            ;" ;
  $queryResult = $conn->query($sql);
  $result = $queryResult->fetch_all(MYSQLI_ASSOC);
  echo "<pre>"; print_r($result); echo "</pre>" ;
}
?>