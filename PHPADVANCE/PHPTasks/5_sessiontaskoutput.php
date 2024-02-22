<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    if(isset($_SESSION['name'])){
        echo "Hii, " . $_SESSION['name'] ."<br>";
        if(isset($_SESSION['username'])){
            echo"Your UserName is  : " . $_SESSION['username'] . "<br>";
        }
        else{
            echo("Session variable not set") ;
        }
    }else{
        Echo "Session variable is not set yet" ;
    }
    ?>
</body>
</html>