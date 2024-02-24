<?php
{
    /*
    The LIKE operator evaluates to TRUE if a value matches a specified pattern
    To form a pattern, we use "%" and "_"
    In this syntax, if the expression matches the pattern, the LIKE operator returns 1. Otherwise, it returns 0.
    -> % : matches a string of zero or more characters 
    -> _ : matches any single character only
    -> Note that the pattern is not case-sensitive. Therefore, the b% and B% patterns return the same result.
    */
}
ECHO "EXAMPLE 1 : <br>";
{
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
    $conn = null;
}

echo '<hr>' ;

//Example 2 
Echo 'Example 2 : <br>';
{
    class ConnectionFailedException extends Exception{};
    try{
        $conn = new mysqli('localhost' , 'root' , '' , 'classicmodels') ;
            $queryResult = $conn->query("SELECT firstname, lastname , officeCode FROM employees WHERE firstname like 'T_m' ");
            $result = $queryResult->fetch_all(MYSQLI_ASSOC);
            echo "<pre>" ; 
            print_r($result);
            echo "</pre>";

    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

echo '<hr>' ; 
//Example 3
Echo "EXAMPLE 3 : <BR>"; 
{
    $sqlQuery = "SELECT employeeNumber, firstName , lastName FROM employees WHERE firstName LIKE 'A%'; ";
    $queryResult = $conn->query($sqlQuery);

    $result  = $queryResult->fetch_all(MYSQLI_ASSOC);

    echo "<pre>"; print_r($result); echo "</pre>";

}

echo "<HR>";
//EXAMple 4 ;
Echo "EXAMPLE 4 : <BR>";
{
    $sql = "SELECT employeeNumber , firstName , LastName FROM employees WHERE firstName LIKE '%a%'  ORDER BY firstName;" ;
    $queryResult = $conn->query($sql);
    $result = $queryResult->fetch_all(MYSQLI_ASSOC);

    echo "<pre>"; print_R($result); Echo "</pre>";

}

echo "<HR>";
//Example 5;
ECHO "EXAMPLE 5: <BR>";
{
    $sql = "SELECT 
                productCode,
                productName
            FROM
                products
            WHERE 
                productCode LIKE '%\_20%' ; " ;
    $queryResult = $conn->query($sql);
    $result = $queryResult->fetch_all(MYSQLI_ASSOC);

    echo "<pre>" ; print_r($result); echo "</prev>" ;
}

$conn->close();
?>

<!--
{ 
    Summary
    Use the LIKE operator to test if a value matches a pattern.
    The % wildcard matches zero or more characters.
    The _ wildcard matches a single character.
    Use ESCAPE clause specifies an escape character other than the default escape character (\).
    Use the NOT operator to negate the LIKE operator.
} 
-->