<?php 

$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'testingPHP';



// MySQLi objectOriented

$conn = new mysqli($server , $user , $password , $dbname);

if($conn->connect_error){
    echo "ERROR " . $conn->connect_error ;
}
$sql = 
'INSERT INTO customers
    (firstName , lastName , email , mobile)
VALUES
    (? , ? , ? , ? )
';

$stmt = $conn->prepare($sql);
$stmt->bind_param('ssss' , $firstName , $lastName , $email , $mobile);

//set parameters and execute
$firstName = 'kevin' ;
$lastName = 'owens' ;
$email = 'kevinowens123@gmail.com';
$mobile = '1234456778';
$stmt->execute();
if($stmt->error){
    ECHO "ERROR : " . $stmt->error;
}

$firstName = 'fin' ;
$lastName = 'balor';
$email = 'finbalor123@gmail.com';
$mobile = '233232322';
$stmt->execute();

if($stmt->error){
    ECHO "ERROR : " . $stmt->error;
}

echo "New Records created successfully<br>";

$stmt->close();
$conn->close();

//PDO 
try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname;" , $user , $password);
    $sql = 
    'INSERT INTO customers
        (firstName , lastName , email , mobile)
    VALUES
        (? , ? , ? , ? )
    ';
    $stmt = $conn->prepare($sql);
    // $stmt->bindParam($firstName , $lastName , $email , $mobile);

    $firstName = 'jon';
    $lastName = 'moxley';
    $email = 'jonmoxley123@gmail.com';
    $mobile = '3424235345';

    $stmt->execute([$firstName , $lastName , $email , $mobile]);

    echo "record sucessfully add by prepared statement in pdo<BR>";

    $stmt = null;
    $conn = null;

}
catch(PDOException $e){
    ECHO 'ERROR : ' . $e->getMessage(); 
}


// to bind name param in pdo syntax

$calories = 150;
$colour = 'red';

$sth = $dbh->prepare('SELECT name, colour, calories FROM fruit WHERE calories < :calories AND colour = :colour');
$sth->bindParam('calories', $calories, PDO::PARAM_INT);
$sth->bindParam(':colour', $colour, PDO::PARAM_STR);
$sth->execute();

// to bind ? param in pdo syntax

$calories = 150;
$colour = 'red';

$sth = $dbh->prepare('SELECT name, colour, calories FROM fruit WHERE calories < ? AND colour = ?');
$sth->bindParam(1, $calories, PDO::PARAM_INT);
$sth->bindParam(2, $colour, PDO::PARAM_STR);
$sth->execute();

/**
    PREPARED STATEMENTS
 * prepared statement are very useful against sql injections.
 * A ps is a feature used to execute the same sql stmt repeatedly
 * with high efficiency.
 * 
 * ps basically work like this : 
 1 . PREPARE : 
 * AN sql stmt template is created and sent to db. certain values are left upspecified 
 * called parameters (labeled "?").
 * 
 2) PROCESS:
 *The db parses , compiles and performs query optimization on the sql stmt template
 *stores  the result without executing it.
 * 
 3) EXECUTE: 
 * At a later time , the application binds the value to the parameters
 * and the db executes the stmt. The application may execute the stmt as
 * many times as it wants with different valeus;
 */
?>