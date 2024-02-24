<?php
/*
The SELECT statement allows you to select data from one or more tables. To write a SELECT statement in MySQL, you use this syntax:
SELECT select_list
FROM table_name;
*/

//example 1 Fetch data with PDO Object

Echo "Connection using PDO :<BR>";
try{

$conn = new PDO("mysql:host=localhost;dbname=classicmodels;" , 'root' , "");;

$query = $conn->prepare("SELECT * FROM employees WHERE employeeNumber = 1002"); //return prepare obj

$query->execute() ; //returns true/false

echo"<pre>" ;
print_r($query->fetchAll(PDO::FETCH_ASSOC)); // return asscotiative array
// print_r($query->fetchAll(PDO::FETCH_NUM)); // returns indexed array
// print_r($query->fetchAll(PDO::FETCH_OBJ)); //return result as object
// print_r($query->fetchAll(PDO::FETCH_BOTH)); // default parameter gives both index and assoc array
echo"</pre>" ;

$conn = null; //to close PDO connection 

}
catch(PDOException $e){
    echo "ERROR " .$e->getMessage();
    $conn = null; //to close PDO connection 
}

//example 2 using mysqli(object oriented);
echo "Connectio using mysqli (OBJECT ORIENTED )<br>";

class ConnectionFailedException extends Exception{};
try{
    $conn1 = new mysqli("localhost" , "root" , "" , "classicmodels") ;
    if($conn1->connect_error){
        throw new ConnectionFailedException("Error : Failed to connect database!<br>");
    }
    else{
        $queryResult = $conn1->query("SELECT * FROM employees WHERE employeeNumber = 1076 ");
        echo "<pre>" ;
        // print_r($queryResult->fetch_all(MYSQLI_NUM)); // default return indexed array 
        print_r($queryResult->fetch_all(MYSQLI_ASSOC)); //return assoc array
        // print_r($queryResult->fetch_all(MYSQLI_BOTH)) ;//return both indexed/assoc
        echo "</pre>";
    }
}
catch(Exception $e){
    echo $e->getMessage();
}
?>