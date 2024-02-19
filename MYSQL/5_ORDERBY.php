<?php 

Echo "EXAMPLE 1 sort the result in ASC : <BR>" ;

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels" , 'root' , '') ;

    $query = "SELECT
              contactLastname,
              contactFirstname
              FROM
              customers
              ORDER BY
              contactLastName ;";

    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
   
    foreach ($result as $values){
        foreach($values as $key=>$value){
            echo "$key : $value  || ";
        }
        echo "<BR>";
    }

}
catch(PDOException $e){
    echo "ERROR : " . $e->getMessage();
}
Echo "EXAMPLE 2 : Sort the result by DESC <BR>" ;

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels" , 'root' , '') ;

    $query = "SELECT
              contactLastname,
              contactFirstname
              FROM
              customers
              ORDER BY
              contactLastName DESC;";

    $preparedStatement = $conn->prepare($query);
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
   
    foreach ($result as $values){
        foreach($values as $key=>$value){
            echo "$key : $value      | ";
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
* When you use the SELECT statement to query data from a table,
  the order of rows in the result set is unspecified.

* To sort the rows in the result set, you add the ORDER BY clause to the SELECT statement.
* SYNTAX
    SELECT 
        select_list
    FROM 
       table_name
    ORDER BY 
       column1 [ASC|DESC], 
       column2 [ASC|DESC],
       ...;

* In this syntax, you specify the one or more columns that you want to sort after the ORDER BY clause.

* The ASC stands for ascending and the DESC stands for descending. You use ASC to sort the result set in ascending order and DESC to sort the result set in descending order.

* This ORDER BY clause sorts the result set by the values in the column1 in ascending order:
    
    ORDER BY column1 ASC;

* And this ORDER BY clause sorts the result set by the values in the column1 in descending order:

    ORDER BY column1 DESC;

*By default, the ORDER BY clause uses ASC if you don’t explicitly specify any option. Therefore, the following ORDER BY clauses are equivalent:

    ORDER BY column1 ASC;

and

    ORDER BY column1;

* If you want to sort the result set by multiple columns, you specify a comma-separated list of columns in the ORDER BY clause:

    ORDER BY
       column1,
       column2;


In this case, the ORDER BY clause sorts the result set by column1 in ascending order first and sorts the sorted result set by column2 in ascending order.

* It is possible to sort the result set by a column in ascending order and then by another column in descending order:

ORDER BY
    column1 ASC,
    column2 DESC;
-->