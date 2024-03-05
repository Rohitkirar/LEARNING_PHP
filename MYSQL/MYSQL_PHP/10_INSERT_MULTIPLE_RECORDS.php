<?php 
$server = 'localhost';
$user = 'root' ;
$password = '';
$dbname = 'testingPHP';

$sql = 
'INSERT INTO customers
    (firstName , lastName , email , mobile)
VALUES
    ("dean" , "ambrouse" , "1deanamb123@gmail.com" , "10099887766");
';
$sql .= 
'INSERT INTO customers
    (firstName , lastName , email , mobile )
VALUES 
    ("daniel" , "bryan" , "2danielbryan123@gmail.com" , "24433221155");
';
$sql .= 
'INSERT INTO customers
    (firstName , lastName , email , mobile )
VALUES 
    ("aj" , "styles" , "3ajstyles123@gmail.com" , "33322114455");
';

//procedural
ECHO "MYSQLI PROCEDURAL <BR>";

$conn = mysqli_connect($server , $user , $password , $dbname);

if(!$conn){
    echo "ERROR : " . mysqli_connect_error($conn);
}
$result = mysqli_multi_query($conn , $sql);

if($result === true)
    echo "MULTIPLE RECORDS inserted successfully<BR>";
else{
    echo "ERROR : " . mysqli_error($conn);
}

mysqli_close($conn);

//mysqli object oriented 
ECHO "MYSQLI OBJECT ORIENTED <BR>";

$conn = new mysqli($server , $user , $password , $dbname);

if($conn->connect_error){
    echo "ERROR " . $conn->connect_error;
}
$result = $conn->multi_query($sql);

if($result === true){
    echo "MULTIPle records inserted successfully<BR>";
}
else{
    Echo "ERROR " . $conn->error;
}
$conn->close();

// PDO 
ECHO "<BR>PDO <BR>"; 

try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname;" , $user , $password);

    $conn->beginTransaction();

    $conn->exec('INSERT INTO customers
    (firstName , lastName , email , mobile)
    VALUES
        ("dean" , "ambrouse" , "4deanamb123@gmail.com" , "40099887766")
    ');
    $conn->exec('INSERT INTO customers
    (firstName , lastName , email , mobile )
    VALUES 
        ("daniel" , "bryan" , "5danielbryan123@gmail.com" , "54433221155")
    ');
    $conn->exec('INSERT INTO customers
    (firstName , lastName , email , mobile )
    VALUES 
        ("aj" , "styles" , "6ajstyles123@gmail.com" , "63322114455")
    ');
    $conn->commit();
    echo "multiple records inserted successfully<BR>";
}
catch(PDOException $e){
    echo "ERROR " . $e->getMessage();
}
$conn = null;

?>