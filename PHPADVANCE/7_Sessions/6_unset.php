<?php 
session_start();

$_SESSION['name'] = "Prem Chopra" ;
$_SESSION['city'] = "Ahemdabaad" ;
$_SESSION['number']= "+91954905309";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <?php 
            echo "<H1> Session variable are : </H1>" ; 
            foreach($_SESSION as $key => $value){
                echo "$key : $value <br>" ;
            }

            unset($_SESSION['number']);

            echo "<H1> Session variable after unseting are : </h1>" ;
            foreach($_SESSION as $key => $value){
                echo "$key : $value <br>" ;
            }
        ?>
    </div>
</body>
</html>