<?php
 
/**
 * LIMIT clause is used in the SELECT statement to constrain the number of rows to return.
 * The LIMIt clause accepts one or two arguments.
 * The value of both argument must be zero or +ve integers.
 * SELECT 
 *   select_list
 * FROM
 *   table_name
 * LIMIT [offset,] row_count;
 * 
 * The offset specifies the offset of the first row to return. The offset of the first row is 0, not 1.
 * The row_count specifies the maximum number of rows to return.
 */

$conn = new mysqli("localhost", "root" , "" , "classicmodels");

Echo "EXAMPLE 1 : <BR>";
{
    $sql = "SELECT 
                customerNumber,
                customerName,
                creditLimit
            FROM
                customers
            ORDER BY 
                creditLiMIT DESC
            LIMIT 5 ; " ;

    $queryResult = $conn->query($sql);
    $result = $queryResult->fetch_all(MYSQLI_ASSOC);

    echo "<pre>" ; print_r($result) ; echo "</pre>" ;
}

ECho "<hr>EXAMPLE 2 : <BR>" ;
{
    $sql = "SELECT 
                customerNumber, 
                customerName ,
                creditLimit
            From
                customers
            ORDER BY
                creditLimit,
                customerNumber
            LIMIT 5 ;";
    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);

    echo "<pre>"; print_R($resultArray); echo "</pre>" ;
}

Echo "<hr>EXAMPLE 3 ; <BR> " ;
{
    $sql = "SELECT 
                customerNumber,
                customerName
            FROM
                customers
            ORDER BY customerNumber
            LIMIT 10 ;" ;
    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
    echo "<pre>" ; print_r($resultArray); echo "</pre>" ;
}

Echo "<hr>EXAMPLE 4 ; <BR> " ;
{
    $sql = "SELECT 
                customerNumber,
                customerName
            FROM
                customers
            ORDER BY customerNumber
            LIMIT 10 , 10 ;" ;
    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
    echo "<pre>" ; print_r($resultArray); echo "</pre>" ;
}


Echo "<hr>EXAMPLE 5 : <BR>"; //to find highest/ credit limit
{
    $sql = "SELECT 
                customerNumber,
                customerName,
                creditLimit
            FROM
                customers
            ORDER BY 
                creditLiMIT DESC
            LIMIT 0 ,1 ; " ;

    $queryResult = $conn->query($sql);
    $result = $queryResult->fetch_all(MYSQLI_ASSOC);

    echo "<pre>" ; print_r($result) ; echo "</pre>" ;
}

?>