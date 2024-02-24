<?php 
//IN operator returns true if a value matches any value in a list;
//value IN (value1, value2,...)
Echo "EXAMpLE 1 : <BR>";
{
  try{
  $conn = new PDO("mysql:host=localhost;dbname=classicmodels;" ,"root" , "");
  $query = "SELECT 
              firstName,
              lastName,
              officeCode
          FROM 
              employees
            WHERE 
              officeCode IN (1,2,3)";
  $preparedStatement = $conn->prepare($query);
  $preparedStatement->execute();
  $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

  echo "<pre>";
  print_r($result);
  echo "</pre>";
  $conn = null;
  }
  catch(PDOException $e){
      echo "ERROR : ". $e->getMessage();
  }
}

// Example 2 
ECHO "<HR>EXAMPLE 2 : <BR>";
{
  try{
      $conn = new PDO("mysql:host=localhost;dbname=classicmodels;" , "root" , "");
      $query = "SELECT 
                  customername,
                  contactlastname,
                  country
                FROM 
                  customers
                WHERE
                  country IN ('USA' , 'Spain' , 'France')
                ORDER BY 
                  country ; ";
      
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
}

Echo "<HR>EXAMPLE 3 : <BR>";
{
  $conn = new mysqli("localhost" , 'root' , '' , 'classicmodels');
  $sql = "SELECT 
           officeCode,
           city,
           phone,
           country
          FROM
            offices
          WHERE 
            country IN ('Spain' , 'FRANCE'); 
            " ;
  $queryResult = $conn->query($sql);
  $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);

  echo "<pre>" ; print_r($resultArray) ; echo "</pre>";
}

Echo "<HR>EXAMPLE 4 : <BR>";
{
  $sql = "SELECT 
            officeCode,
            city,
            phone,
            country
          FROM
            offices
          WHERE
            country = 'USA' 
            OR
            country = 'FRANCE' 
          ORDER BY
            country;";
  $queryResult = $conn->query($sql);
  $result = $queryResult->fetch_all(MYSQLI_ASSOC);
  echo "<pre>" ; print_r($result); echo "</pre>" ;
}
?>