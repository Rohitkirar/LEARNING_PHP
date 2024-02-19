<?php 
/*
* The WHERE clause allows you to specify a search condition for the rows returned by a query. The following shows the syntax of the WHERE clause:

SELECT 
    select_list
FROM
    table_name
WHERE
    search_condition;

* The search_condition is a combination of one or more expressions using the logical operator AND, OR and NOT.
* Besides the SELECT statement, you can use the WHERE clause in the UPDATE or DELETE statement to specify which rows to update or delete.
* When executing a SELECT statement with a WHERE clause, MySQL evaluates the WHERE clause after the FROM clause and before the SELECT and ORDER BY clauses:
*/

try{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels;" , 'root' , '') ;
    $query = "SELECT 
                lastname,
                firstname,
                jobtitle
            FROM
                employees
            WHERE
                jobtitle = 'Sales Rep'";
    
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

?>