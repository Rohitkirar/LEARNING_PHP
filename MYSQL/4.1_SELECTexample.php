<?php 
//Example 3 
ECHO "EXAMPLE 3 : <BR> ";

try{

    $conn = new PDO("mysql:host=localhost;dbname=classicmodels" , 'root' , '');

    $preparedStatement = $conn->prepare("SELECT lastname FROM employees");
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($result as $value){
        echo "LastName : " . $value['lastname'] ."<br>";
    }

    $conn=null;
}catch(PDOException $e){
    echo $e->getMessage();
}

echo "<HR>" ;

echo "EXAMPLE 4 : <BR>" ;

try{

    $conn = new PDO("mysql:host=localhost;dbname=classicmodels" , 'root' , '');

    $preparedStatement = $conn->prepare("SELECT firstname , LASTName , jobtitle FROM employees");
    $preparedStatement->execute();
    $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($result as $value){
        echo "FirstName : " . $value['firstname'] . " | LastName : " . $value['LASTName'] . " | JobTitle : " . $value['jobtitle'] ."<br>";
    }
    
    $conn=null;
}catch(PDOException $e){
    echo $e->getMessage();
}
?>