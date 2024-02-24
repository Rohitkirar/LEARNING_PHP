<?php 
/**
 * When querying data from a table, you may get duplicate rows.
 * To remove these duplicate rows, you use the DISTINCT clause in the SELECT statement.
 * Summary
 * Use the MySQL DISTINCT clause to remove duplicate rows from the result set returned by the SELECT clause.
 */
$conn = new mysqli("localhost" , "root" , "" , "classicmodels" );

Echo "EXAMPLE 1 : Lastname with DISTINCT KEYWORD<BR>";
{
    $sql = "SELECT DISTINCT
                lastName 
            FROM
                employees
            ORDER BY
                lastname ; ";
    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
    echo "<table><tr><th>LAST NAME </th></tr>";
    for($x = 0 ; $x<count($resultArray) ; $x++){
        echo "<tr><td>".$resultArray[$x]['lastName']."</td></tr>";
    }
    echo "</table>";
}
echo "<hr>";

Echo "EXAMPLE 2 : Lastname without DISTINCT KEYWORD<BR>";
{
    $sql = "SELECT 
                lastName 
            FROM
                employees
            ORDER BY
                lastname ; ";
    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);
    
    echo "<table><tr><th>LAST NAME </th></tr>";
    for($x = 0 ; $x<count($resultArray) ; $x++){
        echo "<tr><td>".$resultArray[$x]['lastName']."</td></tr>";
    }
    echo "</table>";
}
echo "<hr>";

Echo "EXAMPLE 3 : STATE  DISTINCT KEYWORD<BR>";
{
    $sql = "SELECT DISTINCT 
                state
            FROM
                customers ; ";
    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);

    echo "<table><tr><th>STATE NAME </th></tr>";
    for($x = 0 ; $x<count($resultArray) ; $x++){
        echo "<tr><td>".$resultArray[$x]['state']."</td></tr>";
    }
    echo "</table>";
}

echo "<HR>";
Echo "EXAMPLE 4 : STATE & CITY DISTINCT and NOT NULl KEYWORD<BR>";
{
    $sql = "SELECT DISTINCT 
                state,
                city
            FROM
                customers 
            WHERE
                state IS NOT NULL
            ORDER BY
                state,
                city; ";

    $queryResult = $conn->query($sql);
    $resultArray = $queryResult->fetch_all(MYSQLI_ASSOC);

    echo "<table><tr><th>STATE NAME </th><th>CITY NAME </th></tr>";
    for($x = 0 ; $x<count($resultArray) ; $x++){
        echo "<tr><td>".$resultArray[$x]['state']."</td><td>".$resultArray[$x]['city']."</td></tr>";
    }
    echo "</table>";
}
?>