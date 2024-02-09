<?php 
//Modify a PHP Session Variable
// to modify the session variable, just overwrite it .
session_start() ;
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
    echo "Session id : " . session_id() . "<BR>" ;
    
    $_SESSION['favcolor'] = "Bhagwa" ;

    print_r($_SESSION);

    echo "<BR>" ;

    $_SESSION['username'] = "ROHIT@123";
    $_SESSION["Password"] = "12345" ;

    print_r($_SESSION);

    ?>

</body>
</html>